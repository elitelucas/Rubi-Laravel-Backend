<?php

namespace App\Actions\Order;

use App\Models\Order;

class RemoveOrder
{
    public function handle(Order $order): ?bool
    {
        return $order->delete();
    }
}
