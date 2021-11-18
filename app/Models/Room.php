<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['flat_name', 'flat_type', 'room_name', 'price', 'status', 'max_occupancy', 'description', 'floor'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function roomcalendar()
    {
        return $this->hasMany(RoomCalendar::class)->with('reservation');
    }
}
