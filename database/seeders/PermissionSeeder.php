<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        # super admin can do everything
        Permission::firstOrCreate(['name' => 'create-super-admin']);
        Permission::firstOrCreate(['name' => 'update-super-admin']);
        Permission::firstOrCreate(['name' => 'delete-super-admin']);
        Permission::firstOrCreate(['name' => 'list-super-admin']);

        Permission::firstOrCreate(['name' => 'create-client-admin']);
        Permission::firstOrCreate(['name' => 'update-client-admin']);
        Permission::firstOrCreate(['name' => 'delete-client-admin']);
        Permission::firstOrCreate(['name' => 'list-client-admin']);

        Permission::firstOrCreate(['name' => 'create-client-customer']);
        Permission::firstOrCreate(['name' => 'update-client-customer']);
        Permission::firstOrCreate(['name' => 'delete-client-customer']);
        Permission::firstOrCreate(['name' => 'list-client-customer']);

        Permission::firstOrCreate(['name' => 'create-collaborator']);
        Permission::firstOrCreate(['name' => 'update-collaborator']);
        Permission::firstOrCreate(['name' => 'delete-collaborator']);
        Permission::firstOrCreate(['name' => 'list-collaborator']);

        Permission::firstOrCreate(['name' => 'create-order']);
        Permission::firstOrCreate(['name' => 'update-order']);
        Permission::firstOrCreate(['name' => 'delete-order']);
        Permission::firstOrCreate(['name' => 'list-order']);

        Permission::firstOrCreate(['name' => 'create-collection']);
        Permission::firstOrCreate(['name' => 'update-collection']);
        Permission::firstOrCreate(['name' => 'delete-collection']);
        Permission::firstOrCreate(['name' => 'list-collection']);

        Permission::firstOrCreate(['name' => 'create-subscription']);
        Permission::firstOrCreate(['name' => 'update-subscription']);
        Permission::firstOrCreate(['name' => 'delete-subscription']);
        Permission::firstOrCreate(['name' => 'list-subscription']);

        Permission::firstOrCreate(['name' => 'create-product']);
        Permission::firstOrCreate(['name' => 'update-product']);
        Permission::firstOrCreate(['name' => 'delete-product']);
        Permission::firstOrCreate(['name' => 'list-product']);
    }
}
