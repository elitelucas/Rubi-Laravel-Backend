<?php

namespace App\Http\Controllers;

use App\Actions\OrderStatus\CreateOrderStatus;
use App\Actions\OrderStatus\ListAllOrderStatuses;
use App\Actions\OrderStatus\RemoveOrderStatus;
use App\Actions\OrderStatus\UpdateOrderStatus;
use App\Http\Requests\OrderStatusStoreRequest;
use App\Http\Requests\OrderStatusUpdateRequest;
use App\Http\Resources\OrderStatusResource;
use App\Models\OrderStatus;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class OrderStatusController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(OrderStatus::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ListAllOrderStatuses $listAllOrderStatuses): AnonymousResourceCollection
    {
        return OrderStatusResource::collection($listAllOrderStatuses->handle(request: $request));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderStatusStoreRequest $request, CreateOrderStatus $orderStatusCreator): OrderStatusResource
    {
        $orderStatus = $orderStatusCreator->handle($request->safe()->toArray());
        return OrderStatusResource::make($orderStatus);
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderStatus $orderStatus): OrderStatusResource
    {
        return OrderStatusResource::make($orderStatus);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderStatusUpdateRequest $request, OrderStatus $orderStatus, UpdateOrderStatus $orderStatusUpdater): OrderStatusResource
    {
        $updatedOrderStatus = $orderStatusUpdater->handle(orderStatus: $orderStatus, data: $request->safe()->toArray());
        return OrderStatusResource::make($updatedOrderStatus);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderStatus $orderStatus, RemoveOrderStatus $orderStatusRemover): JsonResponse
    {
        if ($orderStatusRemover->handle($orderStatus)) {
            return response()->json([
                'message' => 'Order status removed sucessfully.',
            ]);
        }

        return response()->json([
            'error' => 'An error occurred removing order status.'
        ]);
    }
}
