<?php

namespace App\Actions\Invitation;

use App\Exceptions\UserAlreadyJoinedWorkspaceException;
use App\Models\Invitation;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Database\Eloquent\Model;

class CreateInvitation
{
    /**
     * Makes a new invitation.
     *
     * @throws UserAlreadyJoinedWorkspaceException
     */
    public function handle(User $user, array $data): Model|Invitation
    {
        /** @var Workspace $workspace */
        $workspace = Workspace::findOrFail($data['workspace_id']);
        if ($workspace->users()->pluck('email')->contains($data['email'])) {
            throw new UserAlreadyJoinedWorkspaceException();
        }

        return $user->invitations()->create($data);
    }
}
