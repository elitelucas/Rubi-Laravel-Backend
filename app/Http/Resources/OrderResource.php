<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'user' => UserResource::make($this->whenLoaded('user')),
            'tax_total' => $this->tax_total,
            'discount_total' => $this->discount_total,
            'subtotal' => $this->subtotal,
            'total' => $this->total,
            'status' => OrderStatusResource::make($this->whenLoaded('status'))
        ];
    }
}
