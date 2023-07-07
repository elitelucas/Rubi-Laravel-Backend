<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateUser
{
    public function handle(array $data)
    {
        $userData = collect($data)
            ->merge([
                'uuid' => Str::uuid()->toString(),
                // TODO: change to Auth::user()->id when auth comes
                'created_by_user_id' => 1,
                'password' => Hash::make($data['password']),
            ])
            ->toArray();

        return User::create($userData);
    }
}
