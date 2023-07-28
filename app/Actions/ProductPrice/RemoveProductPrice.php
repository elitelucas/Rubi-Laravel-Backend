<?php

namespace App\Actions\ProductPrice;

use App\Models\ProductPrice;

class RemoveProductPrice
{
    public function handle(ProductPrice $model): ?bool
    {
        return $model->delete();
    }
}
