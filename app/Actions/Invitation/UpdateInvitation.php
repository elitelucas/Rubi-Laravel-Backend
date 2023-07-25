<?php

namespace App\Actions\Invitation;

use App\Models\Invitation;

class UpdateInvitation
{
    public function handle(Invitation $invitation, array $data): Invitation|bool
    {
        if ($invitation->update($data)) {
            return $invitation->refresh();
        }

        return false;
    }
}
