<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'address_type_id' => $this->address_type_id,
            'address_type_name' => $this->addressType->name,
            'address_line1' => $this->address_line_1,
            'address_line2' => $this->address_line_2,
            'city' => $this->city,
            'state' => $this->state,
            'postal_code' => $this->postal_code,
            'country_id' => $this->country_id,
            'country_name' => $this->country->name,
            'archived' => $this->archived
        ];
    }
}
