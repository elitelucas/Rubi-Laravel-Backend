<?php

namespace App\Actions\PriceType;

use App\Models\PriceType;

class RemovePriceType
{
    public function handle(PriceType $priceType): ?bool
    {
        return $priceType->delete();
    }
}
