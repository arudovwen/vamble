<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CalendarResource extends JsonResource
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
            'start' => $this->reservation->checkIn,
            'end' => $this->reservation->checkOut,
            'title' => $this->user->name . ' checked in ' . $this->room->name . ' Room'
        ];
    }
}
