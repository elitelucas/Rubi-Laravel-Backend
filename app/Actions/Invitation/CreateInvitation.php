<?php

namespace App\Actions\Invitation;

use App\Exceptions\InvitationNumberExceeded;
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
     * @throws InvitationNumberExceeded
     */
    public function handle(User $user, array $data): Model|Invitation
    {
        /** @var Workspace $workspace */
        $workspace = Workspace::query()
            ->findOrFail($data['workspace_id'])
            ->load(['userSubscription', 'userSubscription.subscription']);

        if ($workspace->users()->pluck('email')->contains($data['email'])) {
            throw new UserAlreadyJoinedWorkspaceException();
        }

        if ($user->invitations()->count() >= $workspace->userSubscription->subscription->collaborators) {
            throw new InvitationNumberExceeded();
        }

        return $user->invitations()->create($data);
    }
}
