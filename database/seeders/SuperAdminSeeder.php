<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = \App\Models\User::create([
            'firstname' => 'Super',
            'lastname' => 'Admin',
            'email' => 'root@bitjarlab.com',
            'username' => 'root',
            'password' => Hash::make('123456'),
            'role' => 'super-admin',
            'status' => 'active',
        ]);
    }
}
