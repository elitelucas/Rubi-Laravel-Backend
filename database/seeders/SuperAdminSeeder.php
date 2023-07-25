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
        $superAdmin = User::create([
            'uuid' => 'e5b49222-b4d9-48b0-b41f-5ec3b80be7a0',
            'firstname' => 'Super',
            'lastname' => 'Admin',
            'mobile' => '9186050328',
            'email' => 'root@bitjarlab.com',
            'username' => 'root',
            'role' => 'super-admin',
            'status' => 'active',
            'password' => Hash::make('123456'),
            'date_of_birth' => '1970-01-01',
            'ip_address' => '1.1.1.1'
        ]);
        /** @var User $superAdmin */
        $superAdmin->assignRole(RoleEnum::SUPER_ADMIN->value);
    }
}
