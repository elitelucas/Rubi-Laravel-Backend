<?php

namespace App\Actions\UserSubscription;

use App\Models\UserSubscription;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UpdateUserSubscription
{
    /**
     * @throws \Throwable
     */
    public function handle(UserSubscription $userSubscription, array $data): UserSubscription
    {
        $userSubscription->updateOrFail(
            array_merge($data, ['renewal_at' => Carbon::parse($data['expiration_at'])->addDay()])
        );
        return $userSubscription->refresh();
    }
}
