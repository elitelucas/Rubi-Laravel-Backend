<?php

namespace App\Actions\OrderStatus;

use App\Models\OrderStatus;

class CreateOrderStatus
{
    public function handle(array $data): OrderStatus
    {
        return OrderStatus::create($data);
    }
}
