<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $fillable = [
        'reservation_id',
        'reference',
        'message',
        'status',
        'trxref',
        'redirecturl',
        'user_id',
        'payment_type',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
