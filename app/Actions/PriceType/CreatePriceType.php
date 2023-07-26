<?php

namespace App\Actions\PriceType;

use App\Models\PriceType;

class CreatePriceType
{
    public function handle(array $data): PriceType
    {
        return PriceType::create($data);
    }
}
