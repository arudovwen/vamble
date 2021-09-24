<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'total', 'price', 'available', 'occupied', 'short_name', 'max_occupancy'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    public function roomcalendar()
    {
        return $this->hasMany(RoomCalendar::class);
    }
}
