<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EstateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'area' => $this->area,
            'floor' => $this->floor,
            'WC' => $this->WC,
            'room' => $this->room,
            'parking' => $this->parking,
            'elevator' => $this->elevator,
            'storehouse' => $this->storage,
            'totalPrice' => $this->totalPrice,
            'mortgage' => $this->mortgage,
            'rent' => $this->rent,
            'type' => $this->type,

            'category' => $this->whenLoaded('category', function () {
                return CategoryResource::make($this->resource->category);
            }),
            'city' => $this->whenLoaded('city', function () {
                return CityResource::make($this->city);
            }),

        ];
    }
}
