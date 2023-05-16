<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return  [
            // 'id' => $this ->id,
            // 'name' => $this -> name,
            // 'create_by_id' => $this -> create_by_id,
            // 'member'=> $this-> member,
            "id"=>$this->id,
            'name'=>$this->name,
            'member'=> $this->member,
            'user_id'=> $this->user_id,
        ];
    }
}
