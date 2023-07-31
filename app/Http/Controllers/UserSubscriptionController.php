<?php

namespace App\Http\Controllers;

use App\Actions\UserSubscription\CreateUserSubscription;
use App\Actions\UserSubscription\ListAllUserSubscriptions;
use App\Actions\UserSubscription\RemoveUserSubscription;
use App\Actions\UserSubscription\UpdateUserSubscription;
use App\Http\Requests\UserSubscriptionStoreRequest;
use App\Http\Requests\UserSubscriptionUpdateRequest;
use App\Http\Resources\UserSubscriptionResource;
use App\Models\UserSubscription;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Throwable;

class UserSubscriptionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(UserSubscription::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ListAllUserSubscriptions $listAllUserSubscriptions): AnonymousResourceCollection
    {
        return UserSubscriptionResource::collection($listAllUserSubscriptions->handle(request: $request));
    }

    /**
     * Store a newly created resource in storage.
     * @throws Throwable
     */
    public function store(UserSubscriptionStoreRequest $request, CreateUserSubscription $userSubscriptionCreator): UserSubscriptionResource
    {
        $userSubscription = $userSubscriptionCreator->handle($request->user(), $request->safe()->toArray());
        return UserSubscriptionResource::make($userSubscription->load(['user', 'subscription']));
    }

    /**
     * Display the specified resource.
     */
    public function show(UserSubscription $userSubscription): UserSubscriptionResource
    {
        return UserSubscriptionResource::make($userSubscription);
    }

    /**
     * Update the specified resource in storage.
     * @throws Throwable
     */
    public function update(UserSubscription $userSubscription, UserSubscriptionUpdateRequest $request, UpdateUserSubscription $userSubscriptionUpdater): UserSubscriptionResource
    {
        $updatedUserSubscription = $userSubscriptionUpdater->handle(
            userSubscription: $userSubscription,
            data: $request->safe()->toArray()
        );

        return UserSubscriptionResource::make($userSubscription->load(['user', 'subscription']));
    }

    /**
     * Remove the specified resource from storage.
     * @throws Throwable
     */
    public function destroy(UserSubscription $userSubscription, RemoveUserSubscription $userSubscriptionRemover): JsonResponse
    {
        if ($userSubscriptionRemover->handle($userSubscription)) {
            return response()->json([
                'message' => 'User subscription cancelled sucessfully.',
            ]);
        }

        return response()->json([
            'error' => 'An error occurred cancelling user subscription.'
        ]);
    }
}
