<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateUser
{
    /**
     * Updates the user.
     *
     * @param User $user
     * @param array $data
     * @return bool|User
     */
    public function handle(User $user, array $data): bool|User
    {
        // Need to hash the user password if is set
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->forceFill($data);

        if ($user->save()) {
            return $user->refresh();
        }

        return false;
    }
}
