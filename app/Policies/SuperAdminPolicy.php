<?php

namespace App\Policies;

use App\Models\SuperAdmin;
use App\Models\User;

class SuperAdminPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('list-super-admin');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, SuperAdmin $superAdmin): bool
    {
        return $user->can('list-super-admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, SuperAdmin $superAdmin): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SuperAdmin $superAdmin): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SuperAdmin $superAdmin): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SuperAdmin $superAdmin): bool
    {
        return false;
    }
}
