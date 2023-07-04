<?php

namespace App\Actions\Client;

use App\Enums\RoleEnum;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Support\Facades\Hash;

class CreateClient
{
    public function handle($data): User
    {
        $user = User::create([
            'firstname' => $data->firstname,
            'lastname' => $data->lastname,
            'email' => $data->email,
            'password' => Hash::make($data->password),
        ]);

        
        $user->assignRole(RoleEnum::CLIENT_ADMIN);

        return $user;
    }
}
