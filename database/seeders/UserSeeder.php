<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $robert = User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Robert',
            'lastname' => 'Sacco',
            'mobile' => '9186050328',
            'email' => 'robert.sacco@bitjarlabs.com',
            'username' => 'bitjarlabs',
            'password' => Hash::make('123456'),
            'role' => 'super-admin',
            'status' => 'active',
            '2fa_verified' => true,
            'date_of_birth' => '1970-10-02',
            'ip_address' => '72.100.90.263',
        ]);
        $robert->assignRole(RoleEnum::SUPER_ADMIN->value);

        $flex = User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Flex',
            'lastname' => 'Sacco',
            'email' => 'admin@myflex.ai',
            'username' => 'flex',
            'password' => Hash::make('123456'),
            'role' => 'client-admin',
            'mobile' => '9186050328',
            'status' => 'active',
            '2fa_verified' => true,
            'date_of_birth' => '1970-10-02',
            'ip_address' => '72.100.90.263',
        ]);
        $flex->assignRole(RoleEnum::CLIENT_ADMIN->value);

        $corey = User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Corey',
            'lastname' => 'Davidson',
            'mobile' => '5122896014',
            'email' => 'corey.davidson@bitjarlabs.com',
            'username' => 'corey',
            'password' => Hash::make('123456'),
            'role' => 'client-customer',
            'status' => 'active',
            '2fa_verified' => false,
            'date_of_birth' => '1970-03-05',
            'ip_address' => '72.102.23.234',
        ]);
        $corey->assignRole(RoleEnum::CUSTOMER->value);

        $jay = User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Jay',
            'lastname' => 'Dixon',
            'mobile' => '9188985542',
            'email' => 'jay.dixon@bitjarlabs.com',
            'username' => 'jay',
            'password' => Hash::make('123456'),
            'role' => 'client-customer',
            'status' => 'active',
            '2fa_verified' => false,
            'date_of_birth' => '1989-08-23',
            'ip_address' => '74.292.213.12',
        ]);
        $jay->assignRole(RoleEnum::CUSTOMER->value);
    }
}
