<?php

namespace App\Http\Resources;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\Permission\Models\Permission;

/**
 * @mixin User
 */
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
            'date_of_birth' => $this->date_of_birth,
            'preferred_language' => LanguageResource::make($this->whenLoaded('preferredLanguage')),
            'ip_address' => $this->ip_address,
            'tin' => $this->tin,
            // adiciona ao array as credenciais do passport
            'api_token' => $this->when(
                $this->clients()->count(),
                fn() => [
                    'client_id' => $this->clients()->first()->id,
                    'client_secret' => $this->clients()->first()->secret,
                ]
            ),
            // mock for front
            'permissions' => Permission::get()->pluck('name'),
            // 'permissions' => $this->getAllPermissions()
        ];
    }
}
