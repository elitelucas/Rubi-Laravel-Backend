<?php

namespace App\Actions\OrderStatus;

use App\Models\OrderStatus;

class UpdateOrderStatus
{
    public function handle(OrderStatus $orderStatus, array $data): bool|OrderStatus
    {
        $orderStatus->forceFill($data);
        if ($orderStatus->save()) {
            return $orderStatus->refresh();
        }

        return false;
    }
}
