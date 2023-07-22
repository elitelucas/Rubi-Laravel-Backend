<?php

namespace App\Actions\ProductCategory;

use App\Models\ProductCategory;

class CreateProductCategory
{
    public function handle(array $data): Product
    {
        return ProductCategory::create($data);
    }
}
