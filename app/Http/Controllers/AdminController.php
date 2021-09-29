<?php

namespace App\Http\Controllers;

use App\Http\Resources\CalendarResource;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\RoomCalendar;
use App\Models\User;
use App\Services\RoomService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class AdminController extends Controller
{


    public $roomService;
    public function __construct(RoomService $roomService)
    {
        $this->middleware('auth');
        $this->roomService = $roomService;
    }

    public function dashboard()
    {
        $start = Carbon::now()->startOfWeek();
        $end  = Carbon::now()->endOfWeek();

        $data  = Reservation::where([['created_at', '>=', $start], ['created_at', '<=', $end]])->get();
        $customers = User::where('role_id', 3)->get();

        return view('admin.dashboard', compact('data', 'customers'));
    }
    public function users()
    {
        $users = User::where('role_id', 3)->paginate(15);
        return view('admin.users',  compact('users'));
    }
    public function reservations()
    {

        $reservations = Reservation::with('room', 'user', 'roomcalendar')->paginate(15);
        return view('admin.reservations', compact('reservations'));
    }
    public function transactions()
    {

        $reservations = Reservation::with('room', 'user')->paginate(15);
        return view('admin.transactions', compact('reservations'));
    }
    public function rooms()
    {
        $rooms = Room::paginate(15);
        return view('admin.rooms',  compact('rooms'));
    }
    public function roomsearch()
    {

        $rooms = Room::all();
        return view('admin.roomsearch',  compact('rooms'));
    }
    public function calendar()
    {
        $events  = RoomCalendar::with('user', 'reservation', 'room')->get();
        return view('admin.calendar', compact('events'));
    }
}
