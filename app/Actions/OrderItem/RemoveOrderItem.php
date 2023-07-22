<?php

namespace App\Actions\OrderItem;

use App\Models\OrderItem;

class RemoveOrderItem
{
    public function handle(OrderItem $orderItem): ?bool
    {
        return $orderItem->delete();
    }
}
