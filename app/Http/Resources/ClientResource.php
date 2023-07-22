<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'superadmin' => $this->superAdmin->name,
            'business_name' => $this->business_name,
            'domain' => $this->domain,
            'platform_id' => $this->plaform_id,
            'client_product_package_id' => $this->client_product_package_id
        ];
    }
}
