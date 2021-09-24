<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Reservation;
use App\Models\RoomCalendar;
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


      $reservation =  Reservation::create([
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
        'room_id'  => $request->room_id,
        'user_id'  => $user->id,
        'status' => $request->status

      ]);

      $calendar =  RoomCalendar::where('room_id', $request->room_id)->first();
      $calendar->user_id = $user->id;
      $calendar->reservation_id = $reservation->id;
      $calendar->save();

      return $calendar->load('room', 'user', 'reservation');
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

    // if (!Gate::allows('find_room_access')) {
    //   return abort(401);
    // }
    $time_from = Carbon::parse($request->input('checkIn'));
    $time_to = Carbon::parse($request->input('checkOut'));
    $room_id = $request->room_id;

    if ($request->isMethod('POST')) {
      $rooms = RoomCalendar::with('reservation')->whereHas('reservation', function ($q) use ($time_from, $time_to) {
        $q->where(function ($q2) use ($time_from, $time_to) {
          $q2->where('check_in', '>=', $time_to)
            ->orWhere('check_out', '<=', $time_from);
        });
      })->orWhereDoesntHave('reservation')->get()->filter(function ($a) use ($room_id) {
        return $a->room_id == $room_id;
      });
    } else {
      $rooms = null;
    }
    if (count($rooms)) {
      return response()->json(
        [
          'message' => 'available',
          'rooms' => $rooms
        ]
      );
    };
    return response()->json(
      [
        'message' => 'unavailable',

      ]
    );
  }

  public function removereservation($reservation)
  {
    $reservation->delete();
    return response()->json('deleted');
  }
}
