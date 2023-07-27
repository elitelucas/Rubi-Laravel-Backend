<?php

namespace App\Http\Controllers;

use App\Actions\AddressUser\CreateAddressUser;
use App\Actions\Collaborator\CreateCollaborator;
use App\Actions\User\CreateUser;
use App\Exceptions\AcceptedInvitationException;
use App\Http\Requests\CollaboratorRegisterStoreRequest;
use App\Http\Resources\CollaboratorResource;
use App\Models\Invitation;
use Illuminate\Support\Facades\DB;

class CollaboratorRegisterController extends Controller
{
    /**
     * Handle the collaborator auto registration
     * @throws AcceptedInvitationException
     */
    public function __invoke(
        CollaboratorRegisterStoreRequest $request,
        CreateUser $userCreator,
        CreateAddressUser $addressUserCreator,
        CreateCollaborator $collaboratorCreator
    ) {
        return DB::transaction(function () use (
            $request,
            $userCreator,
            $addressUserCreator,
            $collaboratorCreator
        ) {
            // First, we need check if the invitation on query string is already accepted
            /** @var Invitation $invitation */
            $invitation = Invitation::findOrFail($request->safe()->invitation);
            if ($invitation->accepted) {
                throw new AcceptedInvitationException();
            }
            // Second, create a collaborator with input data
            $user = $userCreator->handle(data: $request->safe()->toArray());
            $addressUserCreator->handle(user: $user, data: $request->safe()->toArray()['address']);
            $collaborator = $collaboratorCreator->handle(
                collaboratorUser: $user,
                data: $request->safe()->merge(['customer_user_id' => $invitation->user_id])->toArray()
            );
            // Final step is tie the collaborator to the workspace on invitation
            $user->workspaces()->syncWithoutDetaching([$invitation->workspace_id]);

            return CollaboratorResource::make(
                $collaborator->load(['user', 'user.addresses', 'user.preferredLanguage', 'customer'])
            );
        });
    }
}
