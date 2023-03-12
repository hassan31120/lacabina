<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrdersResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->users->name,
            'email' => $this->users->email,
            'number' => $this->users->number,
            'total' => (float) $this->total,
            'status' => $this->status,
            'image' => asset($this->orderDetails[0]->image),
            'pay_status' => $this->pay_status,
            'grandTotal' => (float) $this->grandTotal,
            'created_at' => $this->created_at->diffForhumans(),
            'products' => DetailsResource::collection($this->orderDetails)
        ];
    }
}
