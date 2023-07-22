<?php

namespace App\Actions\Product;

use App\Models\Product;

class UpdateProduct
{
    public function handle(Product $product, array $data): bool|Product
    {
        $product->forceFill($data);
        if ($product->save()) {
            return $product->refresh();
        }

        return false;
    }
}
