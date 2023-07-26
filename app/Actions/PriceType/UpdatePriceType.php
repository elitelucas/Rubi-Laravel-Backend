<?php

namespace App\Actions\PriceType;

use App\Models\PriceType;

class UpdatePriceType
{
    public function handle(PriceType $priceType, array $data): bool|Product
    {
        return $priceType->save();
    }
}
