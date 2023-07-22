<?php

namespace App\Actions\Subscription;

use App\Models\Subscription;

class RemoveSubscription
{
    public function handle(Subscription $subscription): ?bool
    {
        return $subscription->delete();
    }
}
