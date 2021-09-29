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


    $check_in = Carbon::parse($request->input('checkIn'));
    $check_out = Carbon::parse($request->input('checkOut'));
    $room_id = $request->room_id;
    $roomtype = Room::find($room_id)->name;
    $roomsneeded = $request->rooms;


    // All room type
    $allfreerooms = [];
    $allrooms = Room::has('roomcalendar')->with('roomcalendar')->get();

    foreach ($allrooms as $q) {
      $res = $q->roomcalendar->contains(function ($q2) use ($check_in, $check_out) {
        return $check_in->between($q2->check_in, $q2->check_out);
      });

      if (!$res) {
        array_push($allfreerooms, $q);
      }
    }
    $allroomswitoutcalendar = Room::whereDoesntHave('roomcalendar')->get();
    $allmergedrooms = array_merge($allfreerooms, $allroomswitoutcalendar->values()->all());


    // Specific type
    $freerooms = [];
    $rooms = Room::has('roomcalendar')->with('roomcalendar')->where('name', $roomtype)->get();

    foreach ($rooms as $q) {
      $res = $q->roomcalendar->contains(function ($q2) use ($check_in, $check_out) {
        return $check_in->between($q2->check_in, $q2->check_out);
      });

      if (!$res) {
        array_push($freerooms, $q);
      }
    }
    $roomswitoutcalendar = Room::where('name', $roomtype)->whereDoesntHave('roomcalendar')->get();
    $mergedrooms = array_merge($freerooms, $roomswitoutcalendar->values()->all());


    if (count($mergedrooms) >= $roomsneeded) {
      $message = " Room is available, you can proceed to book the room";

      return response()->json(
        [
          'status' => 'available',
          'message' => $message,
          'rooms' => $allmergedrooms,
          'roomtype' => $mergedrooms
        ]
      );
    };
    if (count($mergedrooms) && count($mergedrooms) < $roomsneeded) {
      $message = "Only " . count($mergedrooms) . " available";

      return response()->json(
        [
          'status' => 'less-available',
          'message' => $message,
          'rooms' => $allmergedrooms,
          'roomtype' => $mergedrooms

        ]
      );
    };
    $message = " Room is unavailable, try to find another room or choose a later date";
    return response()->json(
      [
        'status' => 'unavailable',
        'message' => $message,
        'rooms' => $allmergedrooms,
        'roomtype' => $mergedrooms

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
