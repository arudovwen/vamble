<?php

namespace App\Exports;

use App\Models\Reservation;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportReservation implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Reservation::select(
            'id',
            'booking_no',
            'no_of_guests',
            'no_of_rooms',
            'check_in',
            'check_out',
            'duration',
            'price_per_night',
            'total_price',
            'payment_status',
            'payment_type',
            'status'
        )->get();
    }
}
