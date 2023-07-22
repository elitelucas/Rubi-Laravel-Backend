<?php

namespace App\Policies;

use App\Models\Collection;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CollectionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('list-collection');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Collection $collection): bool
    {
        return $user->can('list-collection');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create-collection');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Collection $collection): bool
    {
        return $user->can('update-collection');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Collection $collection): Response|bool
    {
        if ($collection->subscriptionCollections()->count() > 0 ) {
            return Response::deny('This collection has subscriptions.');
        }

        return $user->can('delete-collection');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Collection $collection): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Collection $collection): bool
    {
        return false;
    }
}
