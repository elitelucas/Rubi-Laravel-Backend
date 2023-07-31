<?php

namespace App\Actions\UserSubscription;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Http\Request;
use InvalidArgumentException;

final class CheckUserSubscription
{

    /**
     * @throws \Throwable
     */
    final public static function handle(User $currentUser, array $data): void
    {
        /** @var User $userToSubscribe */
        $userToSubscribe = User::query()->findOrFail($data['user_id']);
        // 1 - Only clients or customers will have subscriptions
        throw_unless(
            condition: $userToSubscribe->hasAnyRole([
                RoleEnum::CUSTOMER->value,
                RoleEnum::CLIENT_ADMIN->value,
            ]),
            exception: new InvalidArgumentException('Only customers and clients can have subscriptions.', 422)
        );
        /**
         * 2 - Test user roles for subscription create
         * - Super admins can only subscript clients
         * - Clients can only subscript customers
         */
        $rules = collect([
            RoleEnum::SUPER_ADMIN->value => collect([RoleEnum::CLIENT_ADMIN->value]),
            RoleEnum::CLIENT_ADMIN->value => collect([RoleEnum::CUSTOMER->value]),
        ]);
        throw_unless(
            condition: $rules[$currentUser->role]->contains($userToSubscribe->role),
            exception: new InvalidArgumentException("You cant't create a subscription for this user.", 422)
        );
    }

}
