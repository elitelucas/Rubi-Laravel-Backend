<?php

namespace App\Policies;

use App\Models\Invitation;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class InvitationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('list-invitation');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Invitation $invitation): bool
    {
        return $user->can('list-invitation');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create-invitation');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Invitation $invitation): Response|bool
    {
        if ($invitation->accepted) {
            return Response::deny('Invitation already accepted.');
        }

        return $user->can('update-invitation');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Invitation $invitation): bool|Response
    {
        if ($invitation->accepted) {
            return Response::deny('Invitation already accepted.');
        }

        return $user->can('delete-invitation');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Invitation $invitation): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Invitation $invitation): bool
    {
        return false;
    }
}
