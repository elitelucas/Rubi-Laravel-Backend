<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Role::truncate();

        // Create Super Admin Role with all permissions
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $superAdminRole->syncPermissions(Permission::all());

        Role::create(['name' => 'client-admin']);
        Role::create(['name' => 'client-customer']);
        Role::create(['name' => 'collaborator']);

        Schema::enableForeignKeyConstraints();
    }
}
