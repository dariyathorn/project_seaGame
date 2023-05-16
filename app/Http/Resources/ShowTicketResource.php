<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowTicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'seat'=>$this->seat,
            'price'=>$this->price,
            'event_id'=>$this->event,
            'buy_ticket'=>$this->users
        ];
    }
}
