<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\RoomCalendar;

class RoomService
{

  public function addroom($request)
  {

    $room =  Room::create([
      'name' => strtolower($request->name),
      'price' => $request->price,
      'total' => $request->total,
      'available' => $request->total,
      'short_name' => $request->short_name,
      'max_occupancy' => $request->max_occupancy

    ]);
    $roomcalendar = RoomCalendar::create(['room_id' => $room->id]);
    return $room;
  }

  public function getavailablerooms($request)
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
      })->orWhereDoesntHave('reservation')->get();
      if ($room_id) {
        $rooms =  $rooms->filter(
          function ($a) use ($room_id) {
            return $a->room_id == $room_id;
          }
        );
      }
    } else {
      $rooms = null;
    }
    if (count($rooms)) {
      return response()->json(
        [
          'message' => 'available',
          'rooms' => $rooms->load('room')
        ]
      );
    };
    return response()->json(
      [
        'message' => 'unavailable',

      ]
    );
  }



  public function getrooms()
  {
    return Room::all();
  }
  public function updateRoomCheckIn($name, $count)
  {
    $room = Room::where('name', $name)->first();
    $room->occupied =  $room->occupied + $count;
    $room->available =  $room->available - $count;
    $room->save();
    return $room;
  }

  public function updateRoomCheckOut($name, $count)
  {
    $room = Room::where('name', $name)->first();
    $room->occupied =  $room->occupied - $count;
    $room->available =  $room->available + $count;
    $room->save();
    return $room;
  }

  public function updateroom($request, $room)
  {
    $room->name = strtolower($request->name);
    $room->price = $request->price;
    $room->total = $request->total;
    $room->available = $request->total;
    $room->save();
    return $room;
  }

  public function removeroom($room)
  {
    $room->delete();
    return response()->json('deleted');
  }
}
