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
            'name' => $this->user->fullName,
            'superadmin' => $this->superAdmin->fullName,
            'business_name' => $this->business_name,
            'domain' => $this->domain,
            'platform_id' => $this->plaform_id,
            'client_product_package_id' => $this->client_product_package_id
        ];
    }
}
