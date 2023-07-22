<?php

namespace App\Actions\Product;

use App\Models\Product;

class RemoveProduct
{
    public function handle(Product $product): ?bool
    {
        return $product->delete();
    }
}
