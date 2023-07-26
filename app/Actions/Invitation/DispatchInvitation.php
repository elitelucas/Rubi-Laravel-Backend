<?php

namespace App\Actions\Invitation;

use App\Events\InvitationMade;
use App\Models\Invitation;

class DispatchInvitation
{
    public function handle(Invitation $invitation): void
    {
        InvitationMade::dispatch($invitation);
    }
}
