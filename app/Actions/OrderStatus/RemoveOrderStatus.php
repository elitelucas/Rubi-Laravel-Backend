<?php

namespace App\Actions\OrderStatus;

use App\Models\OrderStatus;

class RemoveOrderStatus
{
    public function handle(OrderStatus $orderStatus): ?bool
    {
        return $orderStatus->delete();
    }
}
