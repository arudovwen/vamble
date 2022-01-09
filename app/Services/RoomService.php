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
    $flat_name = $request->flat_name;
    $roomsneeded = $request->rooms;


    // // All room type

    //end here
    $allmergedrooms = Room::with('roomcalendar')->where(strtolower('flat_type'), strtolower($request->flat_type))
      ->where(strtolower('flat_name'), strtolower($request->flat_name))
      ->whereHas('roomcalendar', function ($q) use ($check_in, $check_out) {
        $q->where(function ($q2) use ($check_in, $check_out) {
          $q2->where('check_in', '>=', $check_out)
            ->orWhere('check_out', '<=', $check_in);
        });
      })->orWhereDoesntHave('roomcalendar')->where(strtolower('flat_type'), strtolower($request->flat_type))
      ->where(strtolower('flat_name'), strtolower($request->flat_name))->get();



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
    $room->flat_name = strtolower($request->flat_name);
    $room->flat_type = strtolower($request->flat_type);
    $room->room_name = $request->room_name;
    $room->price = $request->price;
    $room->max_occupancy = $request->max_occupancy;
    $room->description = $request->description;
    $room->floor = $request->floor;
    $room->save();
    $rooms = Room::paginate(15);
    return  view('admin.rooms', compact('rooms'))->with('success', 'Updated');
  }

  public function removeroom($room)
  {
    $room->delete();
    return redirect()->back()->with('success', 'Added successfully');
  }
}
