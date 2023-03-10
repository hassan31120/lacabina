<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            "id" => (int)$this->id,
            "name" => (string) $this->name,
            "userType" => (string) $this->userType,
            "email" => (string) $this->email,
            "number" => (string) $this->number,
            "dateOfBirth" => (string) $this->age,
            "age" => Carbon::parse($this->age)->age,
            "gender" => (string) $this->gender
        ];
    }
}
