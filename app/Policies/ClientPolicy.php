<?php

namespace App\Policies;

use App\Models\User;

class ClientPolicy
{
    public function create(User $user): bool
    {
        return $user->can('create-client-admin');
    }
}
