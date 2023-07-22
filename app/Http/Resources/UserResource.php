<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'mobile' => $this->mobile,
            'email' => $this->email,
            'username' => $this->username,
            'role' => $this->role,
            'status' => $this->status,
            'country_id' => $this->country_id,
            'created_by' => UserResource::make($this->whenLoaded('createdBy')),
            'addresses' => AddressResource::collection($this->whenLoaded('addresses')),
            'date_of_birth'  => $this->date_of_birth,
            'preferred_language' => LanguageResource::make($this->whenLoaded('preferredLanguage')),
            'ip_address' => $this->ip_address
        ];
    }
}
