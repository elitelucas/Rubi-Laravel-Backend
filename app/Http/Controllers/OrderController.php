<?php

namespace App\Http\Controllers;

use App\Actions\Order\CreateOrder;
use App\Actions\Order\ListAllOrders;
use App\Actions\Order\RemoveOrder;
use App\Actions\Order\UpdateOrder;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Order::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ListAllOrders $listAllOrders): AnonymousResourceCollection
    {
        return OrderResource::collection($listAllOrders->handle(request: $request));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderStoreRequest $request, CreateOrder $orderCreator): OrderResource
    {
        $order = $orderCreator->handle($request->safe()->toArray());
        return OrderResource::make($order);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order): OrderResource
    {
        return OrderResource::make($order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderUpdateRequest $request, Order $order, UpdateOrder $orderUpdater): OrderResource
    {
        $updatedOrder = $orderUpdater->handle(order: $order, data: $request->safe()->toArray());
        return OrderResource::make($updatedOrder);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order, RemoveOrder $orderRemover): JsonResponse
    {
        if ($orderRemover->handle($order)) {
            return response()->json([
                'message' => 'Order removed sucessfully.',
            ]);
        }

        return response()->json([
            'error' => 'An error occurred removing order.'
        ]);
    }
}
