<?php

namespace App\Actions\Invitation;

use App\Models\Invitation;

class RemoveInvitation
{
    public function handle(Invitation $invitation): ?bool
    {
        return $invitation->delete();
    }
}
