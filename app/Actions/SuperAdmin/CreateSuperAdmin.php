<?php

namespace App\Actions\SuperAdmin;

use App\Enums\RoleEnum;
use App\Models\User;

class CreateSuperAdmin
{
    public function handle(User $superAdmin): User
    {
        // Assign the role
        $superAdmin->assignRole(RoleEnum::SUPER_ADMIN->value);
        // Simply return the user
        return $superAdmin;
    }
}
