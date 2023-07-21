<?php

namespace App\Actions\Subscription;

use App\Models\Subscription;

class CreateSubscription
{
    public function handle(array $data): Subscription
    {
        return Subscription::create($data);
    }
}
