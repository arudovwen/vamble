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
      'flat_name' => strtolower($request->flat_name),
      'flat_type' => strtolower($request->flat_type),
      'room_name' => strtolower($request->room_name),
      'price' => $request->price,
      'status' => false,
      'description' => $request->description,
      'floor' => $request->floor,
      'max_occupancy' => $request->max_occupancy

    ]);


    return redirect()->back()->with('success', 'Added successfully');
  }

  public function getavailablerooms($request)
  {


    $check_in = Carbon::parse($request->input('checkIn'));
    $check_out = Carbon::parse($request->input('checkOut'));
    $room_id = $request->room_id;
    $flat_type = $request->flat_type;
    $roomsneeded = $request->rooms;


    // // All room type
    // $allfreerooms = [];
    // $allrooms = Room::has('roomcalendar')->where(strtolower('flat_type'), strtolower($request->flat_type))->with('roomcalendar')->get();

    // foreach ($allrooms as $q) {
    //   $res = $q->roomcalendar->contains(function ($q2) use ($check_in, $check_out) {
    //     return $check_in->between($q2->check_in, $q2->check_out);
    //   });

    //   if (!$res) {
    //     array_push($allfreerooms, $q);
    //   }
    // }


    // $allroomswitoutcalendar = Room::whereDoesntHave('roomcalendar')->where(strtolower('flat_type'), strtolower($request->flat_type))->get();
    // $allmergedrooms = array_merge($allfreerooms, $allroomswitoutcalendar->values()->all());
    //end here
    $allmergedrooms = Room::with('roomcalendar')->where(strtolower('flat_type'), strtolower($request->flat_type))->whereHas('roomcalendar', function ($q) use ($check_in, $check_out) {
      $q->where(function ($q2) use ($check_in, $check_out) {
        $q2->where('check_in', '>=', $check_out)
          ->orWhere('check_out', '<=', $check_in);
      });
    })->orWhereDoesntHave('roomcalendar')->where(strtolower('flat_type'), strtolower($request->flat_type))->get();



    if (count($allmergedrooms) >= $roomsneeded) {
      $message = " Room is available, you can proceed to book the room";

      return response()->json(
        [
          'status' => 'available',
          'message' => $message,
          'rooms' => $allmergedrooms,

        ]
      );
    };
    if (count($allmergedrooms) && count($allmergedrooms) < $roomsneeded) {
      $message = "Only " . count($allmergedrooms) . " available";

      return response()->json(
        [
          'status' => 'less-available',
          'message' => $message,
          'rooms' => $allmergedrooms,


        ]
      );
    };
    $message = " Room is unavailable, try to find another room or choose a later date";
    return response()->json(
      [
        'status' => 'unavailable',
        'message' => $message,
        'rooms' => $allmergedrooms,


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
