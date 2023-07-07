<?php

namespace App\Policies;

use App\Models\User;

class CustomerPolicy
{
    public function create(User $user): bool
    {
        return $user->can('create-client-customer');
    }
}
