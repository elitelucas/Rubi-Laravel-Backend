<?php

namespace App\Actions\ProductPrice;

use App\Models\ProductPrice;

class CreateProductPrice
{
    public function handle(array $data): ProductPrice
    {
        return ProductPrice::create($data);
    }
}
