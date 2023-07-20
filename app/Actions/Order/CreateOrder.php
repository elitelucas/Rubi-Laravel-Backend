<?php

namespace App\Actions\Order;

use App\Models\Order;

class CreateOrder
{
    public function handle(array $data): Order
    {
        return Order::create($data);
    }
}
