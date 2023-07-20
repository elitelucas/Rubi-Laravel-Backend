<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CollectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'short_description' => $this->short_description,
            'managed_by' => UserResource::make($this->whenLoaded('managedBy')),
            'created_by' => UserResource::make($this->whenLoaded('createdBy')),
            'icon' => $this->icon
        ];
    }
}
