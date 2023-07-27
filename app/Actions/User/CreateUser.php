<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateUser
{
    public function handle(array $data): User
    {
        $userData = collect($data)
            ->merge([
                'uuid' => Str::uuid()->toString(),
                'created_by_user_id' => Auth::user()->id,
                'password' => Hash::make($data['password']),
            ])
            ->toArray();

        return User::create($userData);
    }
}
