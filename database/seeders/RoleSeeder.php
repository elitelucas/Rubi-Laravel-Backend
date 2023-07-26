<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** @var Role $superAdminRole */
        $superAdminRole = Role::firstOrcreate(['name' => 'super-admin']);
        Role::firstOrcreate(['name' => 'client-admin']);
        Role::firstOrcreate(['name' => 'client-customer']);
        Role::firstOrcreate(['name' => 'collaborator']);

        // Assign all permissions to Super Admin
        $superAdminRole->givePermissionTo(Permission::all());
    }
}
