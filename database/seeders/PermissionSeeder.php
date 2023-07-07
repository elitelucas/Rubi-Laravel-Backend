<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::truncate();

        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        # super admin can do everything
        Permission::create(['name' => 'create-super-admin']);
        Permission::create(['name' => 'update-super-admin']);
        Permission::create(['name' => 'delete-super-admin']);
        Permission::create(['name' => 'list-super-admin']);

        Permission::create(['name' => 'create-client-admin']);
        Permission::create(['name' => 'update-client-admin']);
        Permission::create(['name' => 'delete-client-admin']);
        Permission::create(['name' => 'list-client-admin']);

        Permission::create(['name' => 'create-client-customer']);
        Permission::create(['name' => 'update-client-customer']);
        Permission::create(['name' => 'delete-client-customer']);
        Permission::create(['name' => 'list-client-customer']);

        Permission::create(['name' => 'create-collaborator']);
        Permission::create(['name' => 'update-collaborator']);
        Permission::create(['name' => 'delete-collaborator']);
        Permission::create(['name' => 'list-collaborator']);

        Permission::create(['name' => 'create-order']);
        Permission::create(['name' => 'update-order']);
        Permission::create(['name' => 'delete-order']);
        Permission::create(['name' => 'list-order']);

    }
}
