<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'long_description' => $this->long_description,
            'category' => ProductCategoryResource::make($this->whenLoaded('category')),
            'active' => $this->active,
            'affiliate_price' => $this->affiliate_price,
            'affiliate_monthly_price' => $this->affiliate_monthly_price,
            'affiliate_annual_price' => $this->affiliate_annual_price,
            'retail_price' => $this->retail_price,
            'retail_monthly_price' => $this->retail_monthly_price,
            'retail_annual_price' => $this->retail_annual_price,
            'recurring' => $this->recurring,
            'qv' => $this->qv,
            'cv' => $this->cv,
            'pv' => $this->pv,
            'qc' => $this->qc,
            'ac' => $this->ac
        ];
    }
}
