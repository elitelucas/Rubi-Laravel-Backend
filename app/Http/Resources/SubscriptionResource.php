<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
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
            'description' => $this->description,
            'created_by' => UserResource::make($this->whenLoaded('createdBy')),
            'affiliate_price_monthly' => $this->affiliate_price_monthly,
            'retail_price_monthly' => $this->retail_price_monthly,
            'affiliate_annual' => $this->affiliate_annual,
            'retail_annual' => $this->retail_annual,
            'workspaces' => $this->workspaces,
            'collaborators' => $this->collaborators,
            'words' => $this->words,
            'credits' => $this->credits
        ];
    }
}
