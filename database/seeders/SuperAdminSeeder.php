<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::truncate();

        $superAdmin = User::create([
            'uuid' => Str::uuid()->toString(),
            'firstname' => 'Super',
            'lastname' => 'Admin',
            'email' => 'root1@bitjarlab.com',
            'username' => 'root',
            'role' => 'super-admin',
            'status' => 'active',
            'password' => Hash::make('123456'),
            'country_id' => 1,
            'created_by_user_id' => 1,
        ]);
        /** @var User $superAdmin */
        $superAdmin->assignRole(RoleEnum::SUPER_ADMIN->value);
    }
}
