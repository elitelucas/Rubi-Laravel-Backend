<?php

namespace App\Actions\Order;

use App\Models\Order;
use App\Traits\PaginatesAndSearches;
use Illuminate\Http\Request;

class ListAllOrders
{
    /**
     * List all orders
     *
     * @param Request $request
     * @return mixed
     */
    public function handle(Request $request): mixed
    {
        $perPage = $request->input('per_page');
        $query = Order::with(['user', 'status', 'items'])->latest();
        return $perPage ? $query->paginate($perPage) : $query->get();
    }
}
