<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Models\Reservation;
use App\Mail\BookingSuccess;
use App\Mail\NewReservation;
use App\Models\RoomCalendar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ReservationService
{

  public function handleReservation($request)
  {



    return DB::transaction(function () use ($request) {

      try {
        $duration = Carbon::parse($request->checkIn)->diffInDays(Carbon::parse($request->checkOut));
        $booking_no = rand(10000000, 99999999);
        $checkNo = Reservation::where('booking_no', $booking_no)->first();
        $roomdetail = Room::find($request->room_id);
        while ($checkNo) {
          $booking_no = rand(10000000, 99999999);
          $checkNo = Reservation::where('booking_no', $booking_no)->first();
        }


        $availablerooms = $this->getfreeroom($request);
        if (count($availablerooms) < $request->rooms) {
          return response()->json('not enough');
        }
        $neededrooms = array_slice($availablerooms, 0, $request->rooms);

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
          'price_per_night'  => $roomdetail->price,
          'total_price'  => intval($duration) * intval($roomdetail->price) *  intval($request->rooms),
          'payment_status'  => $request->payment_status,
          'payment_type' => $request->payment_type,
          'room_id'  => $roomdetail->id,
          'user_id'  => $user->id,
          'status' => $request->status

        ]);
        foreach ($neededrooms as $singleroom) {

          $calendar =  RoomCalendar::create(['room_id' => $singleroom->id]);
          $calendar->user_id = $user->id;
          $calendar->reservation_id = $reservation->id;
          $calendar->check_in = $request->checkIn;
          $calendar->check_out = $request->checkOut;
          $calendar->save();
        }

        $detail = [
          'name' => $user->name,
          'booking_no' => $booking_no,
          'no_of_guests' => $request->guests,
          'no_of_rooms'  => $request->rooms,
          'check_in'  => $request->checkIn,
          'check_out'  => $request->checkOut,
          'nights'  => $duration,
          'price_per_night'  => $roomdetail->price,
          'total_price'  => $request->total_price,
          'payment_status'  => $request->payment_status,
          'payment_type' => $request->payment_type,
          'room'  => $roomdetail->name,
          'status' => $request->status
        ];
        $admindetail = [
          'name' => $user->name,
          'email' => $user->email,
          'booking_no' => $booking_no,
          'no_of_guests' => $request->guests,
          'no_of_rooms'  => $request->rooms,
          'check_in'  => $request->checkIn,
          'check_out'  => $request->checkOut,
          'nights'  => $duration,
          'price_per_night'  => $roomdetail->price,
          'total_price'  => $request->total_price,
          'payment_status'  => $request->payment_status,
          'payment_type' => $request->payment_type,
          'room'  => $roomdetail->name,
          'roomshortname'  => $roomdetail->short_name,
          'status' => $request->status
        ];
        // Mail::to($user->email)->send(new BookingSuccess($detail));
        // Mail::to('succy2010@gmail.com')->send(new NewReservation($admindetail));

        return response($reservation, 201);
      } catch (\Throwable $th) {
        throw $th;
      }
    });
  }

  public function updatereservation($request, $reservation)
  {
    return $this->admincheckavailability($request);
  }

  public function getReservation($id)
  {
    Reservation::find($id);
  }

  public function getReservations()
  {
    Reservation::all();
  }
  public function findbooking($booking)
  {

    $booking = Reservation::where('booking_no', strtolower($booking))->with('user', 'room')->first();
    if (is_null($booking)) {
      return response()->json([
        'message' => 'not found'
      ]);
    }
    return $booking;
  }
  public function findbookings($request)
  {

    $user = User::where(strtolower('email'), strtolower($request->booking))->orWhere(strtolower('name'), strtolower($request->booking))->first();

    $booking = Reservation::where('booking_no', strtolower($request->booking))->orWhere('user_id', $user ? $user->id : 0)->with('user', 'room')->get();
    if (is_null($request->booking)) {
      return response()->json([
        'message' => 'not found'
      ]);
    }
    return $booking;
  }

  public function postbookings($request)
  {

    $user = User::where(strtolower('email'), strtolower($request->booking))->orWhere(strtolower('name'), strtolower($request->booking))->first();

    $data = Reservation::where('booking_no', strtolower($request->booking))->orWhere('user_id', $user ? $user->id : 0)->with('user', 'room')->get();
    if (!$data->count()) {
      return redirect()->back()->with('info', 'No booking found!');
    }
    return redirect()->back()->with(['data' => $data]);
  }

  public function admincheckavailability($request)
  {


    $check_in = Carbon::parse($request->input('checkin'));
    $check_out = Carbon::parse($request->input('checkout'));
    $room_id = $request->room_id;
    $roomtype = Room::find($room_id)->name;
    $roomsneeded = $request->rooms;



    $rooms = RoomCalendar::with('reservation', 'room')->whereHas('reservation', function ($q) use ($check_in, $check_out) {
      $q->where(function ($q2) use ($check_in, $check_out) {
        $q2->where('check_in', '>=', $check_out)
          ->orWhere('check_out', '<=', $check_in);
      });
    })->orWhereDoesntHave('reservation')->get();

    $roomtype = RoomCalendar::with('reservation', 'room')->whereHas('reservation', function ($q) use ($check_in, $check_out) {
      $q->where(function ($q2) use ($check_in, $check_out) {
        $q2->where('check_in', '>=', $check_out)
          ->orWhere('check_out', '<=', $check_in);
      });
    })->orWhereDoesntHave('reservation')->get()->filter(function ($a) use ($roomtype) {
      return $a->room->name == $roomtype;
    });

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

  public function checkavailability($request)
  {

    // if (!Gate::allows('find_room_access')) {
    //   return abort(401);
    // }


    $check_in = Carbon::parse($request->input('checkIn'));
    $check_out = Carbon::parse($request->input('checkOut'));
    $room_id = $request->room_id;
    $roomtype = Room::find($room_id)->name;
    $roomsneeded = $request->rooms;

    if ($request->isMethod('POST')) {
      // $rooms = Room::with('roomcalendar')->whereHas('roomcalendar', function ($q) use ($check_in, $check_out) {
      //   $q->where(function ($q2) use ($check_in, $check_out) {
      //     $q2->where('check_in', '>=', $check_out)
      //       ->orWhere('check_out', '<=', $check_in);
      //   });
      // })->orWhereDoesntHave('roomcalendar')->get()->filter(function ($a) use ($roomtype) {
      //   return $a->name == $roomtype;
      // })->values()->all();

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
    } else {
      $rooms = null;
    }

    if (count($mergedrooms) >= $roomsneeded) {
      $message = " Room is available, you can proceed to book the room";

      return response()->json(
        [
          'status' => 'available',
          'message' => $message,
          'rooms' => $mergedrooms
        ]
      );
    };
    if (count($mergedrooms) && count($mergedrooms) < $roomsneeded) {
      $message = "Only " . count($mergedrooms) . (count($mergedrooms) > 1 ? ' rooms' : ' room') . " available";

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

  public function getfreeroom($request)
  {



    $check_in = Carbon::parse($request->input('checkIn'));
    $check_out = Carbon::parse($request->input('checkOut'));
    $room_id = $request->room_id;
    $roomtype = Room::find($room_id)->name;
    $roomsneeded = $request->rooms;


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
    return $mergedrooms;
  }


  public function removereservation($reservation)
  {
    $calendar =  RoomCalendar::where('reservation_id', $reservation->id)->get();

    foreach ($calendar as $value) {
      $value->delete();
    }
    $reservation->delete();
    return redirect('/reservations')->with('success', 'Reservation cancelled');
  }


  public function customercheckin($reservation)
  {

    $reservation->status = 'checked in';
    $reservation->check_in_time = Carbon::now();
    $reservation->save();
    return redirect()->back()->with('success', 'Customer checked in');
  }
  public function customercheckout($reservation)
  {
    $reservation->status = 'checked out';
    $reservation->check_out_time = Carbon::now();
    $reservation->save();
    return redirect()->back()->with('success', 'Customer checked out');
  }
}
