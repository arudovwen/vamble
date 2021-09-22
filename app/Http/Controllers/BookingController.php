<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('booking');
    }

    public function getbookings()
    {
        return view('allbookings');
    }

    public function checkbooking(Request $request)
    {
        $name = 'sucess';
        return redirect('/');
    }

    public function checkavailability(Request $request)
    {
    }
}
