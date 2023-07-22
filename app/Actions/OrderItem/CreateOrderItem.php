<?php

namespace App\Actions\OrderItem;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;

class CreateOrderItem
{
    public function handle(Order $order, array $data): Model
    {
        return $order->items()->create($data);
    }
}
