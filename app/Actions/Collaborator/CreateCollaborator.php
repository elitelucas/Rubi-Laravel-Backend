<?php

namespace App\Actions\Collaborator;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CreateCollaborator
{
    /**
     * Creates a collaborator.
     * The User model for the collaborator must be created before.
     *
     * @param User $collaboratorUser
     * @param array $data
     * @return Model
     */
    public function handle(User $collaboratorUser, array $data): Model
    {
        // Assign the role
        $collaboratorUser->assignRole(RoleEnum::COLLABORATOR->value);
        // Create the collaborator
        return $collaboratorUser->collaborator()->create($data)->refresh();
    }
}
