<?php

namespace App\Actions\ProductCategory;

use App\Models\ProductCategory;

class UpdateProductCategory
{
    public function handle(ProductCategory $product, array $data): bool|Product
    {
        $product->forceFill($data);
        if ($product->save()) {
            return $product->refresh();
        }

        return false;
    }
}
