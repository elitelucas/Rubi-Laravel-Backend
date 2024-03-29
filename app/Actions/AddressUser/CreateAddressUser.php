<?php

namespace App\Actions\AddressUser;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class CreateAddressUser
{
    /**
     * Creates an address for user.
     * The User model for the client must be created before.
     *
     * @param User $user
     * @param array $data
     * @return Model
     */
    public function handle(User $user, array $data): Model
    {
        return $user->addresses()->create($data);
    }

}
