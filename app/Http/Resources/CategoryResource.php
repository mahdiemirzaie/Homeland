<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'parent' => $this->whenLoaded('parent', function () {
                return CategoryResource::collection($this->parent);
            }
            ),

            'children' => $this->whenLoaded('children', function () {
                return CategoryResource::make($this->children);
            }
            ),
            'estates' => $this->whenLoaded('estates', function () {
                return EstateResource::collection($this->estates);
            }),

        ];
    }
}
