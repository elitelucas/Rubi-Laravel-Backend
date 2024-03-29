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
            'subscription' => UserSubscriptionResource::make($this->whenLoaded('userSubscription')),
            'nickname' => $this->nickname,
            'short_description' => $this->short_description,
            'active' => $this->active,
            'created_at' => $this->created_at,
            'collaborators' => UserWorkspaceResource::collection($this->activeCollaborators),
            'usage' => 123,  //fake          
            'keywords' => WorkspaceKeywordResource::collection($this->keywords),
        ];
    }
}
