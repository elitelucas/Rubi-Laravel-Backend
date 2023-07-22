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
        $superAdmin = User::factory()->state([
            'firstname' => 'Super',
            'lastname' => 'Admin',
            'email' => 'root1@bitjarlab.com',
            'username' => 'root',
            'role' => 'super-admin',
            'status' => 'active',
            'password' => Hash::make('1234567'),
            'date_of_birth' => '1970-01-01',
            'ip_address' => '1.1.1.1'
        ])->create();
        /** @var User $superAdmin */
        $superAdmin->assignRole(RoleEnum::SUPER_ADMIN->value);
    }
}
