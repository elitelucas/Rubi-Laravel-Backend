<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::truncate();

        User::create([
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
    }
}
