<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Reservation;

class ReservationService
{

  public function handleReservation($request)
  {



    return DB::transaction(function () use ($request) {
      $room = Room::find($request->room_id);
      $duration = Carbon::parse($request->check_in)->diffInDays(Carbon::parse($request->check_out));
      $user = User::firstOrCreate(
        ['email' => strtolower($request->email)],
        [
          'name' => strtolower($request->name),
          'email' => strtolower($request->email),
          'phone' => $request->phone,
          'address' => strtolower($request->address),  'gender' => strtolower($request->gender),
          'nationality' => strtolower($request->nationality),
          'role_id' => 3
        ]
      );


      $reservation =  Reservation::create([
        'no_of_guests' => $request->no_of_guests,
        'no_of_rooms'  => $request->no_of_rooms,
        'check_in'  => $request->check_in,
        'check_out'  => $request->check_out,
        'duration'  => $duration,
        'price_per_night'  => $room->price,
        'total_price'  => $duration * $room->price,
        'payment_status'  => 'pending',
        'room_id'  => $request->room_id,
        'user_id'  => $user->id,

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

  public function removereservation($reservation)
  {
    $reservation->delete();
    return response()->json('deleted');
  }
}
