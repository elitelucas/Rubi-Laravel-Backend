<?php

namespace App\Actions\Subscription;

use App\Models\Subscription;

class UpdateSubscription
{
    public function handle(Subscription $subscription, array $data): bool|Subscription
    {
        $subscription->forceFill($data);
        if ($subscription->save()) {
            return $subscription->refresh();
        }

        return false;
    }
}
