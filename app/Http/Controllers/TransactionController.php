<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reservation;
use App\Mail\BookingSuccess;
use App\Mail\NewReservation;
use App\Models\RoomCalendar;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{

    public $api_key;
    public function __construct()
    {

        $this->api_key = config('services.paystack.sk');
    }

    public function searchtransactions(Request $request)
    {
        $query = $request->input('query');

        $transactions = Transaction::with('user', 'reservation')->whereHas('user', function ($a) use ($query) {
            return $a->where('name', 'LIKE', '%' . $query . '%');
        })->orWhereHas('reservation', function ($a) use ($query) {
            return $a->where('booking_no', 'LIKE', '%' . $query . '%');
        })->latest()->paginate(15);

        return view('admin.transactions', compact('transactions'));
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

         return  DB::transaction(function () use($request) {
                $duration = Carbon::parse($request->checkIn)->diffInDays(Carbon::parse($request->checkOut));
                $booking_no = rand(10000000, 99999999);
                $checkNo = Reservation::where('booking_no', $booking_no)->first();
                $oneroom = null;
                $slicedroom =  array_slice($request->flats, 0, $request->rooms);

                while ($checkNo) {
                    $booking_no = rand(10000000, 99999999);
                    $checkNo = Reservation::where('booking_no', $booking_no)->first();
                }


                $user = User::firstOrCreate(
                    ['email' => strtolower($request->email)],
                    [
                        'name' => strtolower($request->name),
                        'email' => strtolower($request->email),
                        'phone' => $request->phone,
                        'address' => strtolower($request->address),
                        'gender' => strtolower($request->gender),
                        'nationality' => strtolower($request->nationality),
                        'role_id' => 3
                    ]
                );
                if (strtolower($request->flat_type === 'standard')) {
                    $price_per_night = 30000;
                } else {
                    $price_per_night = 110000;
                }

                $reservation =  Reservation::create([
                    'booking_no' => $booking_no,
                    'no_of_guests' => $request->guests,
                    'no_of_rooms'  => $request->rooms,
                    'check_in'  => $request->checkIn,
                    'check_out'  => $request->checkOut,
                    'duration'  => $duration,
                    'price_per_night'  => $price_per_night,
                    'total_price'  => intval($duration) * intval($price_per_night) *  intval($request->rooms),
                    'payment_status'  => 'paid',
                    'payment_type' => 'online',
                    'user_id'  => $user->id,
                    'status' => 'reserved'

                ]);
                $transaction =  $user->transactions()->create([
                    'reservation_id' => $reservation->id
                ]);
                $transaction->trxref =  $request->response['reference'];
                $transaction->reference =  $request->response['transaction'];
                $transaction->message = $request->response['message'];
                $transaction->status = $request->response['status'];
                $transaction->amount = $reservation->total_price;
                $transaction->payment_type = 'paystack';
                $transaction->save();

                foreach ($slicedroom as $room) {

                    $calendar =  RoomCalendar::create(['room_id' => $room['id']]);
                    $calendar->user_id = $user->id;
                    $calendar->reservation_id = $reservation->id;
                    $calendar->check_in = $request->checkIn;
                    $calendar->check_out = $request->checkOut;
                    $calendar->save();
                    $oneroom = $room;
                }

                $detail = [
                    'name' => $user->name,
                    'booking_no' => $booking_no,
                    'no_of_guests' => $request->guests,
                    'no_of_rooms'  => $request->rooms,
                    'check_in'  => Carbon::parse($request->checkIn)->toFormattedDateString(),
                    'check_out'  => Carbon::parse($request->checkOut)->toFormattedDateString(),
                    'nights'  => $duration,
                    'price_per_night'  => $request->price_per_night,
                    'total_price'  => $request->total_price,
                    'payment_status'  => $request->payment_status,
                    'payment_type' => $request->payment_type,
                    'flat_type'  => ucfirst($oneroom['flat_type']),
                    'status' => ucfirst($request->status)
                ];
                $admindetail = [
                    'name' => $user->name,
                    'email' => $user->email,
                    'booking_no' => $booking_no,
                    'no_of_guests' => $request->guests,
                    'no_of_rooms'  => $request->rooms,
                    'check_in'  => Carbon::parse($request->checkIn)->toFormattedDateString(),
                    'check_out'  => Carbon::parse($request->checkOut)->toFormattedDateString(),
                    'nights'  => $duration,
                    'price_per_night'  => $request->price_per_night,
                    'total_price'  => $request->total_price,
                    'payment_status'  => ucfirst($request->payment_status),
                    'payment_type' => ucfirst($request->payment_type),
                    'flat_type'  => ucfirst($oneroom['flat_type']),
                    'flat_name'  => ucfirst($oneroom['flat_name']),
                    'room'  => $oneroom['room_name'],
                    'status' => ucfirst($request->status)
                ];
                Mail::to($user->email)->send(new BookingSuccess($detail));
                Mail::to('support@vambleapartments.com')->send(new NewReservation($admindetail));


                return response(['status' => 'success', 'booking_no'=> $reservation->booking_no], 200);
           });
       } catch (\Throwable $th) {
           throw $th;
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
