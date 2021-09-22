<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Services\ReservationService;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        return $this->reservationService->handleReservation($request);
    }
    public function show(Reservation $reservation)
    {
        return $reservation;
    }
    public function checkavailability(Request $request)
    {
        return $this->reservationService->checkavailability($request);
    }

    public function findbooking($booking)
    {
        return $this->reservationService->findbooking($booking);
    }
}
