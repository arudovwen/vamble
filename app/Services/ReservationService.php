<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\User;
use App\Mail\BookingUpdate;
use App\Models\Reservation;
use App\Mail\BookingSuccess;
use App\Mail\NewReservation;
use App\Models\RoomCalendar;
use App\Models\GoogleCalendar;
use App\Jobs\BookingSuccessJob;
use Spatie\GoogleCalendar\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\ReservationResource;
use App\Http\Controllers\CalendarController;
use App\Notifications\NewReservationNotification;

class ReservationService
{

  public function handleReservation($request)
  {


    return DB::transaction(function () use ($request) {

      try {
        $duration = Carbon::parse($request->checkIn)->diffInDays(Carbon::parse($request->checkOut));
        $booking_no = rand(10000000, 99999999);
        $checkNo = Reservation::where('booking_no', $booking_no)->first();
        $oneroom = null;
        $slicedroom =  array_slice($request->flats, 0, $request->rooms);
        $checkIn = Carbon::parse($request->checkIn)->midDay();
        $checkOut = Carbon::parse($request->checkOut)->midDay();

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
          'check_in'  => $checkIn,
          'check_out'  => $checkOut,
          'duration'  => $duration,
          'price_per_night'  => $request->price_per_night,
          'total_price'  => intval($duration) * intval($request->price_per_night) *  intval($request->rooms),
          'payment_status'  => $request->payment_status,
          'payment_type' => $request->payment_type,
          'user_id'  => $user->id,
          'status' => $request->status

        ]);

        foreach ($slicedroom as $room) {

          $calendar =  RoomCalendar::create(['room_id' => $room['id']]);
          $calendar->user_id = $user->id;
          $calendar->reservation_id = $reservation->id;
          $calendar->check_in = $checkIn;
          $calendar->check_out = $checkOut;
          $calendar->save();
          $oneroom = $room;
        }

        $detail = [
          'name' => $user->name,
          'booking_no' => $booking_no,
          'no_of_guests' => $request->guests,
          'no_of_rooms'  => $request->rooms,
          'check_in'  => Carbon::parse($request->checkIn)->toFormattedDateString(),
          'check_out'  => Carbon::parse($request->checkOut)->toFormattedDateString(),
          'nights'  => $duration,
          'price_per_night'  => $request->price_per_night,
          'total_price'  => $request->total_price,
          'payment_status'  => $request->payment_status,
          'payment_type' => $request->payment_type,
          'flat_type'  => ucfirst($oneroom['flat_type']),
          'status' => ucfirst($request->status)
        ];
        $admindetail = [
          'name' => $user->name,
          'email' => $user->email,
          'booking_no' => $booking_no,
          'no_of_guests' => $request->guests,
           'phone' => $request->phone,
          'no_of_rooms'  => $request->rooms,
          'check_in'  => Carbon::parse($request->checkIn)->toFormattedDateString(),
          'check_out'  => Carbon::parse($request->checkOut)->toFormattedDateString(),
          'nights'  => $duration,
          'price_per_night'  => $request->price_per_night,
          'total_price'  => $request->total_price,
          'payment_status'  => ucfirst($request->payment_status),
          'payment_type' => ucfirst($request->payment_type),
          'flat_type'  => ucfirst($oneroom['flat_type']),
          'flat_name'  => ucfirst($oneroom['flat_name']),
          'room'  => $oneroom['room_name'],
          'status' => ucfirst($request->status)
        ];

         BookingSuccessJob::dispatch($user,$detail,$admindetail);

        $admin = User::where('email', 'admin@vambleapartments.com')->first();
        $admin->notify(new NewReservationNotification());


        // Add event to google calendar
        $calendar_id = $oneroom['flat_type'].' '.$oneroom['flat_name'];
        $calendar = new CalendarController();
        $calendar->handleCalendar(strtolower($calendar_id));
        $event = new Event;
        $event->name = ucfirst($user->name).' Reservation';
        $event->description = ucfirst($oneroom['flat_type']).' '.ucfirst($oneroom['flat_name']).' reserved';
        $event->startDateTime = $checkIn;
        $event->endDateTime = $checkOut;
       $newEvent = $event->save();

        // Add event id to db
        $googlecal  = new GoogleCalendar();
        $googlecal->reservation_id = $reservation->id;
        $googlecal->google_id = $newEvent->id;
        $googlecal->save();


        return response($reservation, 201);
      } catch (\Throwable $th) {
        throw $th;
      }
    });
  }

  public function adminHandleReservation($request)
  {



    return DB::transaction(function () use ($request) {

      try {
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
          'check_in'  => Carbon::parse($request->checkIn)->midDay(),
          'check_out'  => Carbon::parse($request->checkOut)->midDay(),
          'duration'  => $duration,
          'price_per_night'  => $request->price,
          'total_price'  => intval($duration) * intval($request->price) *  intval($request->rooms),
          'payment_status'  => $request->payment_status,
          'payment_type' => $request->payment_type,
          'room_id'  => 1,
          'user_id'  => $user->id,
          'status' => $request->status

        ]);
        $oneroom = null;
        foreach ($request->flats as $id) {
          $room = Room::find($id);


          $calendar =  RoomCalendar::create(['room_id' => $id]);
          $calendar->user_id = $user->id;
          $calendar->reservation_id = $reservation->id;
          $calendar->check_in = Carbon::parse($request->checkIn)->midDay();
          $calendar->check_out = Carbon::parse($request->checkOut)->midDay();
          $calendar->save();

          $room->status = true;
          $room->save();
          $oneroom = $room;
        }
        $reservation->room_id = $oneroom->id;
        $reservation->save();
        $detail = [
          'name' => $user->name,
          'booking_no' => $booking_no,
          'no_of_guests' => $request->guests,
          'no_of_rooms'  => $request->rooms,
          'check_in'  => Carbon::parse($request->checkIn)->midDay(),
          'check_out'  => Carbon::parse($request->checkOut)->midDay(),
          'nights'  => $duration,
          'price_per_night'  => $request->price,
          'total_price'  => $request->total_price,
          'payment_status'  => $request->payment_status,
          'payment_type' => $request->payment_type,
          'room'  => $request->flat_type,
          'status' => $request->status,
           'phone' => $request->phone,
        ];
        $admindetail = [
          'name' => $user->name,
          'email' => $user->email,
          'phone' => $request->phone,
          'booking_no' => $booking_no,
          'no_of_guests' => $request->guests,
          'no_of_rooms'  => $request->rooms,
          'check_in'  => Carbon::parse($request->checkIn)->midDay(),
          'check_out'  => Carbon::parse($request->checkOut)->midDay(),
          'nights'  => $duration,
          'price_per_night'  => $request->price,
          'total_price'  => $request->total_price,
          'payment_status'  => $request->payment_status,
          'payment_type' => $request->payment_type,
          'flat_type'  => $oneroom->flat_type,
          'flat_name'  => $oneroom->flat_name,
          'room'  => $oneroom->room_name,
          'status' => $request->status,
          'phone' => $request->phone,
        ];

        BookingSuccessJob::dispatch($user, $detail, $admindetail);

        $calendar_id = $oneroom['flat_type'] . ' ' . $oneroom['flat_name'];
        $calendar = new CalendarController($calendar_id);
        $event = new Event;
        $event->name = strtoupper($user->name) . ' Reservation';
        $event->description = ucfirst($oneroom['flat_type']) . ' ' . ucfirst($oneroom['flat_name']) . ' reserved';
        $event->startDateTime = Carbon::parse($request->checkIn)->midDay();
        $event->endDateTime = Carbon::parse($request->checkOut)->midDay();
        $newEvent = $event->save();

        // Add event id to db
        $googlecal  = new GoogleCalendar();
        $googlecal->reservation_id = $reservation->id;
        $googlecal->google_id = $newEvent->id;
        $googlecal->save();

        $admin = User::where('email', 'admin@vambleapartments.com')->first();
        $admin->notify(new NewReservationNotification());



        return response($reservation, 201);
      } catch (\Throwable $th) {
        throw $th;
      }
    });
  }

  public function updatereservation($request, $reservation)
  {
    $calendar = collect($reservation->load('roomcalendar'))['roomcalendar'];
    $ids =  collect($calendar)->map(function ($a) {
      return $a['id'];
    });
    $data = $this->admincheckavailability($request, $ids);




    if ($data['status'] === 'available') {

      $slicedroom =  array_slice($data['rooms']->toArray(), 0, $request->rooms);
      $duration = Carbon::parse($request->checkin)->diffInDays(Carbon::parse($request->checkout));

      if (strtolower($request->flat_type === 'standard')) {
        $price_per_night = 30000;
      } else {
        $price_per_night = 110000;
      }

      $reservation = Reservation::find($request->id);
      $reservation->duration = $duration;
      $reservation->no_of_rooms  = $request->rooms;
      $reservation->no_of_guests  = $request->guests;
      $reservation->check_in =  $request->input('checkin');
      $reservation->check_out =  $request->input('checkout');
      $reservation->price_per_night = $price_per_night;
      $reservation->total_price = intval($duration) * intval($price_per_night) *  intval($request->rooms);
      $reservation->save();

      // Delete old room reservation on calendar
      if (count($ids)) {
        RoomCalendar::destroy($ids);
      }

      // create new reservation
      foreach ($slicedroom as $room) {
        $newcalendar = new RoomCalendar();
        $newcalendar->room_id = $room['id'];
        $newcalendar->user_id = $reservation->user_id;
        $newcalendar->reservation_id = $reservation->id;
        $newcalendar->check_in =  $request->input('checkin');
        $newcalendar->check_out =  $request->input('checkout');
        $newcalendar->save();
      }
      $user = User::find($reservation->user_id);
      $detail = [
        'name' => $user->name,
        'booking_no' => $reservation->booking_no,
        'no_of_guests' => $request->guests,
        'no_of_rooms'  => $request->rooms,
        'check_in'  => Carbon::parse($request->checkin)->toFormattedDateString(),
        'check_out'  => Carbon::parse($request->checkout)->toFormattedDateString(),
        'nights'  => $duration,
        'price_per_night'  => $price_per_night,
        'total_price'  => $reservation->total_price,
        'payment_status'  => $reservation->payment_status,
        'payment_type' => $reservation->payment_type,
        'flat_type'  => ucfirst($request->flat_type),
        'status' => ucfirst($request->status)
      ];
      Mail::to($user->email)->send(new BookingUpdate($detail));

      $reservations = Reservation::with('room', 'user', 'roomcalendar')->latest()->paginate(15);
      return  view('admin.reservations', compact('reservations'))->with('success', $data['message']);
    }
    return redirect()->back()->with('error', $data['message']);
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

    $booking = Reservation::where('booking_no', strtolower($booking))->with('user', 'roomcalendar')->first();
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

    $res = Reservation::where('booking_no', strtolower($request->booking))->orWhere('user_id', $user ? $user->id : 0)->with('user')->get();
    $dataresource = ReservationResource::collection($res);
    if (!$dataresource->count()) {
      return redirect()->back()->with('info', 'No booking found!');
    }
    return redirect()->back()->with(['data' => collect($dataresource)->toArray()]);
  }

  public function admincheckavailability($request, $ids)
  {

    $roomDetail = explode(' ', $request->flat_type);
    $check_in = Carbon::parse($request->input('checkin'));
    $check_out = Carbon::parse($request->input('checkout'));
    $flat_type = $roomDetail[0];
    $flat_name = $roomDetail[1];
    $roomsneeded = $request->rooms;


    $mergedrooms = $rooms = Room::where(strtolower('flat_type'), strtolower($request->flat_type))
      ->where(strtolower('flat_name'), strtolower($request->flat_name))
      ->whereNotIn('id', function ($query) use ($check_in, $check_out, $ids) {
        $query->from('room_calendars')
          ->select('room_id')
          ->whereNotIn('id', $ids)
          ->where('check_in', '<=', $check_out)
          ->where('check_out', '>=', $check_in);
      })->get();


    if (count($mergedrooms) >= $roomsneeded) {
      $message = " Room is available, you can proceed to book the room";

      return
        [
          'status' => 'available',
          'message' => $message,
          'rooms' => $mergedrooms
        ];
    };
    if (count($mergedrooms) && count($mergedrooms) < $roomsneeded) {
      $message = "Only " . count($mergedrooms) . (count($mergedrooms) > 1 ? ' rooms' : ' room') . " available";

      return
        [
          'status' => 'less-available',
          'message' => $message,

        ];
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



    $check_in = Carbon::parse($request->input('checkIn'));
    $check_out = Carbon::parse($request->input('checkOut'));

    $flat_type = $request->flat_type;
    $flat_name = $request->flat_name;
    $roomsneeded = $request->rooms;

    // $calendar_id = $request->flat_type . ' ' . $request->flat_name;
    // $calendar = new CalendarController();
    // return $calendar->checkcalendar(strtolower($calendar_id),$check_in , $check_out);

    if ($request->isMethod('POST')) {

      $mergedrooms = $rooms = Room::where(strtolower('flat_type'), strtolower($request->flat_type))
        ->where(strtolower('flat_name'), strtolower($request->flat_name))
        ->whereNotIn('id', function ($query) use ($check_in, $check_out) {
          $query->from('room_calendars')
            ->select('room_id')
            ->where('check_in', '<=', $check_out)
            ->where('check_out', '>=', $check_in);
        })->get();
    } else {
      $mergedrooms = null;
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
    $roomtype = Room::find($room_id);
    $roomsneeded = $request->rooms;


    $freerooms = [];
    $mergedrooms = $rooms = Room::where(strtolower('flat_type'), strtolower($request->flat_type))->whereNotIn('id', function ($query) use ($check_in, $check_out) {
      $query->from('room_calendars')
        ->select('room_id')
        ->where('check_in', '<=', $check_out)
        ->where('check_out', '>=', $check_in);
    })->get();
    return $mergedrooms;
  }


  public function removereservation( $reservation)
  {
    $calendar =  RoomCalendar::where('reservation_id', $reservation->id)->get();
    $google = GoogleCalendar::where('reservation_id',$reservation->id)->first();
    Event::find($google->id)->delete();

    foreach ($calendar as $value) {
      $value->delete();
    }
    $reservation->delete();
    return response('success');
  }
  public function adminremovereservation( $reservation)
  {
    $calendar =  RoomCalendar::where('reservation_id', $reservation->id)->get();

    foreach ($calendar as $value) {
      $value->delete();
    }
    $google = GoogleCalendar::where('reservation_id', $reservation->id)->first();
    Event::find($google->id)->delete();

    $reservation->delete();
    return redirect('/reservations')->with('success', 'Reservation cancelled');
  }


  public function customercheckin($reservation)
  {

    $reservation->status = 'checked in';
    $reservation->payment_status = 'paid';
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
