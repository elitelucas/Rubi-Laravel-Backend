<?php

namespace App\Actions\OrderItem;

use App\Models\OrderItem;

class UpdateOrderItem
{
    public function handle(OrderItem $orderItem, array $data): bool|OrderItem
    {
        if ($orderItem->update($data)) {
            return $orderItem->refresh();
        }

        return false;
    }
}
