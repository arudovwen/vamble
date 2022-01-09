<?php

namespace App\Http\Resources;

use App\Models\RoomCalendar;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            "no_of_guests" => 1,
            "no_of_rooms" => 2,
            "check_in" => $this->checkIn,
            "check_out" => $this->checkOut,
            "duration" => $this->duration,
            "price_per_night" => $this->price_per_night,
            "total_price" => $this->total_price,
            "payment_status" => $this->payment_status,
            "check_in" => $this->check_in,
            "check_out" => $this->check_out,
            "created_at" => $this->created_at,
            "booking_no" => $this->booking_no,
            "payment_type" => $this->payment_type,
            "status" => $this->status,
            "user"=> $this->user,
            "rooms" => RoomCalendar::where('reservation_id', $this->id)->with('room')->get()
        ];
    }
}
