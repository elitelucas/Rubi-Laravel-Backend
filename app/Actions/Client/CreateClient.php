<?php

namespace App\Actions\Client;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CreateClient
{
    /**
     * Creates a client.
     * The User model for the client must be created before.
     *
     * @param User $clientUser
     * @param array $data
     * @return Model
     */
    public function handle(User $clientUser, array $data): Model
    {
        // Assign the role
        $clientUser->assignRole(RoleEnum::CLIENT_ADMIN->value);
        // Create the client
        return $clientUser->client()->create($data);
    }
}
