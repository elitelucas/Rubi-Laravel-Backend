<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
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
            'order' => OrderResource::make($this->whenLoaded('order')),
            'product' => ProductResource::make($this->whenLoaded('product')),
            'subscription' => SubscriptionResource::make($this->whenLoaded('subscription')),
            'quantity' => $this->quantity,
            'tax' => $this->tax,
            'discount' => $this->discount
        ];
    }
}
