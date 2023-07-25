<?php

namespace App\Actions\ProductCategory;

use App\Models\ProductCategory;

class CreateProductCategory
{
    public function handle(array $data): ProductCategory
    {
        return ProductCategory::create($data);
    }
}
