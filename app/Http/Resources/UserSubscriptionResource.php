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
            'id' => $this->id,
            'user' => UserResource::make($this->whenLoaded('user')),
            'subscription' => SubscriptionResource::make($this->whenLoaded('subscription')),
            'nickname' => $this->nickname,
            'short_description' => $this->short_description,
            'activated_at' => $this->activated_at,
            'expiration_at' => $this->expiration_at,
            'renewal_at' => $this->renewal_at,
            'primary' => $this->primary,
            'active' => $this->active       
        ];
    }
}
