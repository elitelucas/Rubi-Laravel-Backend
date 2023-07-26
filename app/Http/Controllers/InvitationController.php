<?php

namespace App\Http\Controllers;

use App\Actions\Invitation\CreateInvitation;
use App\Actions\Invitation\DispatchInvitation;
use App\Actions\Invitation\ListAllInvitations;
use App\Http\Requests\InvitationStoreRequest;
use App\Http\Resources\InvitationResource;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\DB;

class InvitationController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Invitation::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(
        User $user,
        Request $request,
        ListAllInvitations $listAllInvitations
    ): AnonymousResourceCollection {
        return InvitationResource::collection($listAllInvitations->handle(user: $user, request: $request));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        User $user,
        InvitationStoreRequest $request,
        CreateInvitation $invitationCreator,
        DispatchInvitation $invitationDispatcher
    ): InvitationResource {
        return DB::transaction(function () use ($user, $request, $invitationDispatcher, $invitationCreator) {
            $invitation = $invitationCreator->handle(user: $user, data: $request->safe()->toArray());
            $invitationDispatcher->handle(invitation: $invitation);
            return InvitationResource::make($invitation->load('workspace'));
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user, Invitation $invitation)
    {
        //
    }
}
