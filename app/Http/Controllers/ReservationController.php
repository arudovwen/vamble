<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Services\ReservationService;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{

    public $reservationService;

    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }



    public function index()
    {
        return $this->reservationService->getReservations();
    }

    public function searchreservation(Request $request)
    {
        $query = $request->input('query');

        $reservations = Reservation::with('user')->whereHas('user', function ($a) use ($query) {
            return $a->where('name', 'LIKE', '%' . $query . '%');
        })->orWhere('booking_no', 'LIKE', '%' . $query . '%')->paginate(15);

        return view('admin.reservations', compact('reservations'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        return $this->reservationService->handleReservation($request);
    }
    public function storeByAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        return $this->reservationService->adminHandleReservation($request);
    }
    public function show(Reservation $reservation)
    {
        return $reservation;
    }

    public function update(Request $request, Reservation $reservation)
    {

        return $this->reservationService->updatereservation($request, $reservation);
    }
    public function checkavailability(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'checkIn' => 'required',
            'checkOut' => 'required',
            'room_id' => 'required',
            'rooms' => 'required'
        ]);
        return $this->reservationService->checkavailability($request);
    }

    public function findbooking($booking)
    {
        return $this->reservationService->findbooking($booking);
    }
    public function findbookings(Request $request)
    {
        return $this->reservationService->findbookings($request);
    }
    public function postbookings(Request $request)
    {
        return $this->reservationService->postbookings($request);
    }

    public function edit(Reservation $reservation)
    {
        $rooms = Room::all();
        $reservation = $reservation->load('room', 'user');
        return view('admin.editreservation', compact('reservation', 'rooms'));
    }
    public function customercheckin(Reservation $reservation)
    {
        return $this->reservationService->customercheckin($reservation);
    }
    public function customercheckout(Reservation $reservation)
    {
        return $this->reservationService->customercheckout($reservation);
    }

    public function destroy(Reservation $reservation)
    {
        return $this->reservationService->removereservation($reservation);
    }
    public function admindestroy(Reservation $reservation)
    {
        return $this->reservationService->adminremovereservation($reservation);
    }
}
