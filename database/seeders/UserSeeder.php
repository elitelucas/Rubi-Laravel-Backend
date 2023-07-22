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
        $robert = User::factory()->state([
            'firstname' => 'Robert',
            'lastname' => 'Sacco',
            'mobile' => '9186050328',
            'email' => 'robert.sacco@bitjarlabs.com',
            'username' => 'bitjarlabs',
            'role' => 'superadmin',
            'status' => 'active',
            '2fa_verified' => true,
            'date_of_birth' => '1970-10-02',
            'ip_address' => '72.100.90.263',
        ])->create();
        $robert->assignRole(RoleEnum::SUPER_ADMIN->value);

        $corey = User::factory()->state([
            'firstname' => 'Corey',
            'lastname' => 'Davidson',
            'mobile' => '5122896014',
            'email' => 'corey.davidson@bitjarlabs.com',
            'username' => 'corey',
            'role' => 'customer',
            'status' => 'active',
            '2fa_verified' => false,
            'date_of_birth' => '1970-03-05',
            'ip_address' => '72.102.23.234',
        ])->create();
        $corey->assignRole(RoleEnum::CUSTOMER->value);

        $jay = User::factory()->state([
            'firstname' => 'Jay',
            'lastname' => 'Dixon',
            'mobile' => '9188985542',
            'email' => 'jay.dixon@bitjarlabs.com',
            'username' => 'jay',
            'role' => 'customer',
            'status' => 'active',
            '2fa_verified' => false,
            'date_of_birth' => '1989-08-23',
            'ip_address' => '74.292.213.12',
        ])->create();
        $jay->assignRole(RoleEnum::CUSTOMER->value);
    }
}
