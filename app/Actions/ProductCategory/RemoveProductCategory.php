<?php

namespace App\Actions\ProductCategory;

use App\Models\ProductCategory;

class RemoveProductCategory
{
    public function handle(ProductCategory $product): ?bool
    {
        return $product->delete();
    }
}
