<?php

namespace App\Actions\Order;

use App\Models\Order;

class UpdateOrder
{
    public function handle(Order $order, array $data): bool|Order
    {
        $order->forceFill($data);
        if ($order->save()) {
            return $order->refresh();
        }

        return false;
    }
}
