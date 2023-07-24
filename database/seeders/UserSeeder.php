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
        User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Robert',
            'lastname' => 'Sacco',
            'mobile' => '9186050328',
            'email' => 'robert.sacco@bitjarlabs.com',
            'email_verified_at' => now(),
            'username' => 'bitjarlabs',
            'password' => Hash::make('123456'),
            'role' => 'super-admin',
            'status' => 'active',
            'country_id' => 1,
            '2fa_verified' => true,
            'date_of_birth' => '1970-10-02',
            'ip_address' => '72.100.90.263',
        ])->assignRole(RoleEnum::SUPER_ADMIN->value);

        User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Flex',
            'lastname' => 'Sacco',
            'email' => 'admin@myflex.ai',
            'email_verified_at' => now(),
            'username' => 'flex',
            'password' => Hash::make('123456'),
            'role' => 'client-admin',
            'mobile' => '9186050328',
            'status' => 'active',
            'country_id' => 1,
            '2fa_verified' => true,
            'date_of_birth' => '1970-10-02',
            'ip_address' => '72.100.90.263',
        ])->assignRole(RoleEnum::CLIENT_ADMIN->value);

        User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Corey',
            'lastname' => 'Davidson',
            'mobile' => '5122896014',
            'email' => 'corey.davidson@bitjarlabs.com',
            'email_verified_at' => now(),
            'username' => 'corey',
            'password' => Hash::make('123456'),
            'role' => 'client-customer',
            'status' => 'active',
            'country_id' => 1,
            '2fa_verified' => false,
            'date_of_birth' => '1970-03-05',
            'ip_address' => '72.102.23.234',
        ])->assignRole(RoleEnum::CUSTOMER->value);

        User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Jay',
            'lastname' => 'Dixon',
            'mobile' => '9188985542',
            'email' => 'jay.dixon@bitjarlabs.com',
            'email_verified_at' => now(),
            'username' => 'jay',
            'password' => Hash::make('123456'),
            'role' => 'client-customer',
            'status' => 'active',
            'country_id' => 1,
            '2fa_verified' => false,
            'date_of_birth' => '1989-08-23',
            'ip_address' => '74.292.213.12',
        ])->assignRole(RoleEnum::CUSTOMER->value);

        User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Aimee',
            'lastname' => 'Sacco',
            'mobile' => '9186070673',
            'email' => 'aimeesacco@hotmail.com',
            'email_verified_at' => now(),
            'username' => 'aimee',
            'password' => Hash::make('1234567'),
            'role' => 'collaborator',
            'status' => 'active',
            'country_id' => 1,
            '2fa_verified' => false,
            'date_of_birth' => '1970-10-02',
            'preferred_language_id' => 1,
            'ip_address' => '1.1.1.1',
        ])->assignRole(RoleEnum::COLLABORATOR->value);

        User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Sally',
            'lastname' => 'Sacco',
            'mobile' => '9188985542',
            'email' => 'sally@bitjarlabs.com',
            'email_verified_at' => now(),
            'username' => 'sally',
            'password' => Hash::make('1234567'),
            'role' => 'collaborator',
            'status' => 'active',
            'country_id' => 1,
            '2fa_verified' => false,
            'date_of_birth' => '1970-10-02',
            'preferred_language_id' => '1',
            'ip_address' => '1.1.1.1',
        ])->assignRole(RoleEnum::COLLABORATOR->value);

        User::create([
            'uuid' => Str::uuid(),
            'firstname' => 'Luc',
            'lastname' => 'Sacco',
            'mobile' => '9186070673',
            'email' => 'luc@bitjarlabs.com',
            'email_verified_at' => now(),
            'username' => 'luc',
            'password' => '1234567',
            'role' => 'collaborator',
            'status' => 'active',
            'country_id' => 1,
            '2fa_verified' => false,
            'date_of_birth' => '1970-10-02',
            'preferred_language_id' => '1',
            'ip_address' => '1.1.1.1',
        ])->assignRole(RoleEnum::COLLABORATOR->value);
    }
}
