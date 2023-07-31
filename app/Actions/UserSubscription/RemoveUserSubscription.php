<?php

namespace App\Actions\UserSubscription;

use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Throwable;

class RemoveUserSubscription
{
    /**
     * @throws Throwable
     */
    public function handle(UserSubscription $userSubscription): bool
    {
        return $userSubscription->updateOrFail([
            'active' => false,
        ]);
    }
}
