<?php

namespace App\Http\Controllers;

use App\Actions\OrderItem\CreateOrderItem;
use App\Actions\OrderItem\ListAllOrderItems;
use App\Actions\OrderItem\RemoveOrderItem;
use App\Actions\OrderItem\UpdateOrderItem;
use App\Http\Requests\OrderItemStoreRequest;
use App\Http\Requests\OrderItemUpdateRequest;
use App\Http\Resources\OrderItemResource;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderItemController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(OrderItem::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Order $order, ListAllOrderItems $listAllOrderItems): AnonymousResourceCollection
    {
        return OrderItemResource::collection($listAllOrderItems->handle(request: $request, order: $order));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderItemStoreRequest $request, Order $order, CreateOrderItem $orderItemCreator): OrderItemResource
    {
        $orderItem = $orderItemCreator->handle(order: $order, data: $request->safe()->toArray());
        return OrderItemResource::make($orderItem->load(['order', 'subscription', 'product']));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order, OrderItem $item): OrderItemResource
    {
        return OrderItemResource::make($item->load(['order', 'subscription', 'product']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Order $order, OrderItem $item, OrderItemUpdateRequest $request, UpdateOrderItem $orderItemUpdater): OrderItemResource
    {
        $updatedOrderItem = $orderItemUpdater->handle(orderItem: $item, data: $request->safe()->toArray());
        return OrderItemResource::make($updatedOrderItem->load(['order', 'subscription', 'product']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order, OrderItem $item, RemoveOrderItem $orderItemRemover): JsonResponse
    {
        if ($orderItemRemover->handle($item)) {
            return response()->json([
                'message' => "Order item removed sucessfully.",
            ]);
        }

        return response()->json([
            'error' => 'An error occurred removing order item.'
        ]);
    }
}
