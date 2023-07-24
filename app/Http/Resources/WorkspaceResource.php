<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WorkspaceResource extends JsonResource
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
            'customer' => UserResource::make($this->whenLoaded('customer')),
            'subscription' => SubscriptionResource::make($this->whenLoaded('subscription')),
            'nickname' => $this->nickname,
            'short_description' => $this->short_description,
            'active' => $this->active
        ];
    }
}
