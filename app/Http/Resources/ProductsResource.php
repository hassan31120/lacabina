<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
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
            'title' =>  app()->getLocale() == 'ar' ?  $this->title : $this->title_en,
            'description' =>  app()->getLocale() == 'ar' ?  $this->description : $this->description_en,
            'images' => ProductImageResource::collection($this->images),
            'amount' => $this->amount,
            'old_price' => (float) $this->old_price,
            'new_price' => (float) $this->new_price,
            'sub_id' => (int) $this->sub_id,
            'company' => app()->getLocale() == 'ar' ?  $this->subcategories->categories->title : $this->subcategories->categories->title_en,
            'name' => $this->title,
            'name_en' => $this->title_en,
        ];
    }
}
