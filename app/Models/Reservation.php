<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_of_guests',
        'no_of_rooms',
        'check_in',
        'check_out',
        'duration',
        'price_per_night',
        'total_price',
        'payment_status',
        'room_id',
        'user_id',
        'check_in_time',
        'check_out_time',
        'booking_no',
        'payment_type',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function roomcalendar()
    {
        return $this->hasMany(RoomCalendar::class)->with('room');
    }
}
