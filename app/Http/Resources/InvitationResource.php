<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvitationResource extends JsonResource
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
            'inviter' => UserResource::make($this->whenLoaded('user')),
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'workspace' => WorkspaceResource::make($this->whenLoaded('workspace')),
            'accepted' => $this->accepted
        ];
    }
}
