<?php

namespace App\Policies;

use App\Models\OrderStatus;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrderStatusPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('list-order');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, OrderStatus $orderStatus): bool
    {
        return $user->can('list-order');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('update-order');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, OrderStatus $orderStatus): bool
    {
        return $user->can('update-order');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, OrderStatus $orderStatus): Response|bool
    {
        if ($orderStatus->orders()->count() > 0) {
            return Response::deny('This status has orders.');
        }

        return $user->can('update-order');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, OrderStatus $orderStatus): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, OrderStatus $orderStatus): bool
    {
        return false;
    }
}
