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
      'total' => 1,
      'available' => 1,
      'short_name' => $request->short_name,
      'description' => $request->description,
      'floor' => $request->floor,
      'max_occupancy' => $request->max_occupancy

    ]);
    $roomcalendar = RoomCalendar::create(['room_id' => $room->id]);

    return redirect()->back()->with('success', 'Added successfully');
  }

  public function getavailablerooms($request)
  {


    $time_from = Carbon::parse($request->input('checkIn'));
    $time_to = Carbon::parse($request->input('checkOut'));
    $room_id = $request->room_id;
    $roomtype = Room::find($room_id)->name;
    $roomsneeded = $request->rooms;



    $rooms = Room::with('roomcalendar')->whereHas('roomcalendar', function ($q) use ($time_from, $time_to) {
      $q->where(function ($q2) use ($time_from, $time_to) {
        $q2->where('check_in', '>=', $time_to)
          ->orWhere('check_out', '<=', $time_from);
      });
    })->orWhereDoesntHave('roomcalendar')->get()->toArray();

    $roomtype = Room::with('roomcalendar')->whereHas('roomcalendar', function ($q) use ($time_from, $time_to) {
      $q->where(function ($q2) use ($time_from, $time_to) {
        $q2->where('check_in', '>=', $time_to)
          ->orWhere('check_out', '<=', $time_from);
      });
    })->orWhereDoesntHave('roomcalendar')->get()->filter(function ($a) use ($roomtype) {
      return $a->name == $roomtype;
    })->values()->all();


    if (count($rooms) >= $roomsneeded) {
      $message = " Room is available, you can proceed to book the room";

      return response()->json(
        [
          'status' => 'available',
          'message' => $message,
          'rooms' => $rooms,
          'roomtype' => $roomtype
        ]
      );
    };
    if (count($rooms) && count($rooms) < $roomsneeded) {
      $message = "Only " . count($rooms) . " available";

      return response()->json(
        [
          'status' => 'less-available',
          'message' => $message,

        ]
      );
    };
    $message = " Room is unavailable, try to find another room or choose a later date";
    return response()->json(
      [
        'status' => 'unavailable',
        'message' => $message

      ]
    );
  }



  public function getrooms()
  {
    return Room::get();
  }
  public function getroomtypes()
  {
    return Room::get()->unique('name')->values()->all();
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
    return redirect()->back()->with('success', 'Added successfully');
  }
}
