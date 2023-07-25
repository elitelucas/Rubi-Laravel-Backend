<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserSubscriptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user' => UserResource::make($this->whenLoaded('user')),
            'subscription' => SubscriptionResource::make($this->whenLoaded('subscription')),
            'nickname' => $this->nickname,
            'short_description' => $this->short_description,
            'activation_date' => $this->activation_date,
            'expiration_date' => $this->expiration_date,
            'renewal_date' => $this->renewal_date,
            'active' => $this->active
        ];
    }
}
