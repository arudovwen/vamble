<?php

namespace App\Http\Controllers;

use App\Models\RoomCalendar;
use Illuminate\Http\Request;

class RoomCalendarController extends Controller
{
    public function index()
    {
        return RoomCalendar::all();
    }
}
