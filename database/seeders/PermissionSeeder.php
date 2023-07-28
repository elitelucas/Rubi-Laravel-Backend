<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::truncate();

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

        Permission::create(['name' => 'create-workspace']);
        Permission::create(['name' => 'update-workspace']);
        Permission::create(['name' => 'delete-workspace']);
        Permission::create(['name' => 'list-workspace']);

        Permission::create(['name' => 'create-invitation']);
        Permission::create(['name' => 'update-invitation']);
        Permission::create(['name' => 'delete-invitation']);
        Permission::create(['name' => 'list-invitation']);

        Permission::create(['name' => 'create-product-category']);
        Permission::create(['name' => 'update-product-category']);
        Permission::create(['name' => 'delete-product-category']);
        Permission::create(['name' => 'list-product-category']);

        Permission::create(['name' => 'create-product']);
        Permission::create(['name' => 'update-product']);
        Permission::create(['name' => 'delete-product']);
        Permission::create(['name' => 'list-product']);

        Permission::create(['name' => 'create-price-type']);
        Permission::create(['name' => 'update-price-type']);
        Permission::create(['name' => 'delete-price-type']);
        Permission::create(['name' => 'list-price-type']);

        Permission::create(['name' => 'create-product-price']);
        Permission::create(['name' => 'update-product-price']);
        Permission::create(['name' => 'delete-product-price']);
        Permission::create(['name' => 'list-product-price']);

    }
}
