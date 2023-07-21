<?php

namespace App\Actions\OrderItem;

use App\Models\Order;
use App\Models\OrderItem;
use App\Traits\PaginatesAndSearches;
use Illuminate\Http\Request;

class ListAllOrderItems
{
    /**
     * List all orderItems
     *
     * @param Request $request
     * @param Order $order
     * @return mixed
     */
    public function handle(Request $request, Order $order): mixed
    {
        $perPage = $request->input('per_page');
        $query = $order->items()->with(['order', 'subscription', 'product'])->latest();
        return $perPage ? $query->paginate($perPage) : $query->get();
    }
}
