<?php

namespace App\Services;

use App\Models\Room;

class RoomService
{

  public function addroom($request)
  {

    return  Room::create([
      'name' => strtolower($request->name),
      'price' => $request->price,
      'total' => $request->total,
      'available' => $request->total
    ]);
  }

  public function getavailablerooms($name)
  {
    return   Room::where('name', $name)->value('available');
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
