<?php

namespace App\Http\Controllers;

use App\Actions\Subscription\CreateSubscription;
use App\Actions\Subscription\ListAllSubscriptions;
use App\Actions\Subscription\RemoveSubscription;
use App\Actions\Subscription\UpdateSubscription;
use App\Http\Requests\SubscriptionStoreRequest;
use App\Http\Requests\SubscriptionUpdateRequest;
use App\Http\Resources\SubscriptionResource;
use App\Models\Subscription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Subscription::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(
        Request $request,
        ListAllSubscriptions $listAllSubscriptions
    ): AnonymousResourceCollection {
        return SubscriptionResource::collection($listAllSubscriptions->handle(request: $request));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        SubscriptionStoreRequest $request,
        CreateSubscription $subscriptionCreator
    ): SubscriptionResource {
        $subscription = $subscriptionCreator->handle($request->safe()->toArray());
        return SubscriptionResource::make($subscription);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscription $subscription): SubscriptionResource
    {
        return SubscriptionResource::make($subscription);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        SubscriptionUpdateRequest $request,
        Subscription $subscription,
        UpdateSubscription $subscriptionUpdater
    ): SubscriptionResource
    {
        $updatedSubscription = $subscriptionUpdater->handle($subscription, $request->safe()->toArray());
        return SubscriptionResource::make($updatedSubscription);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $subscription, RemoveSubscription $subscriptionRemover): JsonResponse
    {
        if ($subscriptionRemover->handle($subscription)) {
            return response()->json([
                'message' => 'Subscription removed sucessfully.',
            ]);
        }

        return response()->json([
            'error' => 'An error occurred removing Subscription.'
        ]);
    }
}
