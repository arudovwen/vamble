<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class TransactionController extends Controller
{

    public $api_key;
    public function __construct()
    {

        $this->api_key = config('services.paystack.sk');
    }


    public function transaction($id)
    {
        $data = Reservation::where('booking_no', $id)->first();
        return view('transaction', compact('data'));
    }
    public function getbanks()
    {

        $response = Http::get('https://api.paystack.co/bank?coutry=nigeria');
        return  $bankdata = $response->json()['data'];
    }

    public function store(Request $request)
    {
       try {
        //    access_code	reference	message	status	trxref	redirecturl	reservation_id
            $user = User::where('email', $request->email)->first();
            $transaction =  $user->transactions()->create([
                'reservation_id' => $request->reservation_id
            ]);
            $transaction->trxref =  $request->reference;
            $transaction->reference =  $request->reference;
            $transaction->message = $request->status;
            $transaction->status = $request->status;
            $transaction->amount = $request->amount;
            $transaction->payment_type = $request->payment_type;
            $transaction->save();
            return response(['status' => 'success'], 200);
       } catch (\Throwable $th) {
           //throw $th;
       }
    }

    public function makepayment(Request $request)
    {


        return   DB::transaction(function () use ($request) {
            $request->validate([

                'email' => 'required',
                'amount' => 'required',

            ]);

            $email = $request->email;
            $amount = $request->amount * 100;


            $body = [
                'email' => $email,
                'amount' => $amount,

            ];
            $user = User::where('email', $email)->first();
            $transaction =  $user->transactions()->create([
                'reservation_id' => $request->reservation_id
            ]);


            $response =  Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->api_key,
            ])->post(
                'https://api.paystack.co/transaction/initialize',
                $body
            );
            $data = $response->json()['data'];
            $transaction->access_code = $data['access_code'];
            $transaction->reference =  $data['reference'];
            $transaction->save();
            $url = $data['authorization_url'];
            session()->flash('url', $url);
            return redirect()->back();
        });
    }

    public function verifytransaction($reference)
    {
        return  DB::transaction(function () use ($reference) {
            $response =  Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->api_key,
            ])->get(
                'https://api.paystack.co/transaction/verify/' . $reference
            );
            $transaction  = Transaction::where('reference', $reference)->first();
            $transaction->message = $response->json()['status'];
            $transaction->status = $response->json()['status'];
            $transaction->save();
            $reservation = Reservation::find($transaction->reservation_id);

            if ($response->json()['status'] && strtolower($response->json()['message']) == 'verification successful') {

                $reservation->payment_status = 'success';
                $reservation->save();

                return response()->json([
                    'status' => true,
                    'message' => 'Verification successful'
                ]);
            }

            $reservation->payment_status = 'failed';
            $reservation->save();
            $result = [
                'status' => false,
                'message' => 'Transaction failed'
            ];
            return $result;
        });
    }

    public function transactionevent(Request $request)
    {
        return  DB::transaction(function () use ($request) {

            $transaction  = Transaction::where('reference', $request->reference)->first();

            $transaction->message = $request->message;
            $transaction->status =  $request->status;
            $transaction->save();
            $reservation = Reservation::find($transaction->reservation_id);

            if ($request->event == 'charge.success') {
                $reservation->payment_status = 'success';
                $reservation->save();
                $result = [
                    'status' => true,
                    'message' => 'Transaction successful'
                ];
                return $result;
            }

            $reservation->payment_status = 'failed';
            $reservation->save();
            $result = [
                'status' => false,
                'message' => 'Transaction failed'
            ];

            return $result;
        });
    }
}
