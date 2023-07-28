<?php

namespace App\Actions\ProductPrice;

use App\Models\ProductPrice;

class UpdateProductPrice
{
    public function handle(ProductPrice $product, array $data): bool|Product
    {
        $product->forceFill($data);
        if ($product->save()) {
            return $product->refresh();
        }

        return false;
    }
}
