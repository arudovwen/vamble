<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;

class ReservationService
{

  public function handleReservation($request)
  {



    return DB::transaction(function () use ($request) {
      $room = Room::find($request->apartment);
      $duration = Carbon::parse($request->checkIn)->diffInDays(Carbon::parse($request->checkOut));
      $booking_no = rand(10000000, 99999999);
      $checkNo = Reservation::where('booking_no', $booking_no)->first();
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


      return  $reservation =  Reservation::create([
        'booking_no' => $booking_no,
        'no_of_guests' => $request->guests,
        'no_of_rooms'  => $request->rooms,
        'check_in'  => $request->checkIn,
        'check_out'  => $request->checkOut,
        'duration'  => $duration,
        'price_per_night'  => $room->price,
        'total_price'  => intval($duration) * intval($room->price) *  intval($request->rooms),
        'payment_status'  => $request->payment_status,
        'payment_type' => $request->payment_type,
        'room_id'  => $request->apartment,
        'user_id'  => $user->id,
        'status' => $request->status

      ]);
    });
  }

  public function updatereservation($request)
  {
    $room = Room::find($request->room_id);
    $duration = Carbon::parse($request->check_in)->diffInDays(Carbon::parse($request->check_out));
    return  Reservation::updateOrCreate(
      ['id' => $request->id],
      [
        'no_of_guests' => $request->no_of_guests,
        'no_of_rooms'  => $request->no_of_rooms,
        'check_in'  => $request->check_in,
        'check_out'  => $request->check_out,
        'duration'  => $duration,
        'price_per_night'  => $room->price,
        'total_price'  => $duration * $room->price,
        'payment_status'  => 'pending',
        'room_id'  => $request->room_id,

      ]
    );
  }

  public function getReservation($id)
  {
    Reservation::find($id);
  }

  public function getReservations()
  {
    Reservation::all();
  }
  public function findBooking($booking)
  {

    $booking = Reservation::where('booking_no', strtolower($booking))->with('user', 'room')->first();
    if (is_null($booking)) {
      return response()->json([
        'message' => 'not found'
      ]);
    }
    return $booking;
  }

  public function checkavailability($request)
  {

    $rooms = Room::find($request->apartment);
    $reservations = Reservation::where('status', '!=', 'checkedOut')->get();
    $query = $request->checkIn;
    if ($rooms->available >= $request->rooms) {
      return  response()->json(
        ['message' => 'available']
      );
    }
    return  response()->json(
      ['message' => 'unavailable']
    );
  }

  public function removereservation($reservation)
  {
    $reservation->delete();
    return response()->json('deleted');
  }
}
