<?php

namespace App\Actions\Invitation;

use App\Models\Invitation;

class CreateInvitation
{
    public function handle(array $data)
    {
        return Invitation::create($data);
    }
}
