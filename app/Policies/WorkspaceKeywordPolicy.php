<?php

namespace App\Policies;

use App\Models\User;
use App\Models\WorkspaceKeyword;
use Illuminate\Auth\Access\Response;

class WorkspaceKeywordPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('list-workspace');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, WorkspaceKeyword $workspaceKeyword): bool
    {
        return $user->can('list-workspace');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('update-workspace');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, WorkspaceKeyword $workspaceKeyword): bool
    {
        return $user->can('update-workspace');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, WorkspaceKeyword $workspaceKeyword): bool
    {
        return $user->can('update-workspace');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, WorkspaceKeyword $workspaceKeyword): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, WorkspaceKeyword $workspaceKeyword): bool
    {
        return false;
    }
}
