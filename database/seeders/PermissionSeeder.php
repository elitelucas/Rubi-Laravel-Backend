<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Permission::query()->truncate();

        # super admin can do everything
        Permission::query()->firstOrCreate(['name' => 'create-super-admin']);
        Permission::query()->firstOrCreate(['name' => 'update-super-admin']);
        Permission::query()->firstOrCreate(['name' => 'delete-super-admin']);
        Permission::query()->firstOrCreate(['name' => 'list-super-admin']);

        Permission::query()->firstOrCreate(['name' => 'create-client-admin']);
        Permission::query()->firstOrCreate(['name' => 'update-client-admin']);
        Permission::query()->firstOrCreate(['name' => 'delete-client-admin']);
        Permission::query()->firstOrCreate(['name' => 'list-client-admin']);

        Permission::query()->firstOrCreate(['name' => 'create-client-customer']);
        Permission::query()->firstOrCreate(['name' => 'update-client-customer']);
        Permission::query()->firstOrCreate(['name' => 'delete-client-customer']);
        Permission::query()->firstOrCreate(['name' => 'list-client-customer']);

        Permission::query()->firstOrCreate(['name' => 'create-collaborator']);
        Permission::query()->firstOrCreate(['name' => 'update-collaborator']);
        Permission::query()->firstOrCreate(['name' => 'delete-collaborator']);
        Permission::query()->firstOrCreate(['name' => 'list-collaborator']);

        Permission::query()->firstOrCreate(['name' => 'create-order']);
        Permission::query()->firstOrCreate(['name' => 'update-order']);
        Permission::query()->firstOrCreate(['name' => 'delete-order']);
        Permission::query()->firstOrCreate(['name' => 'list-order']);

        Permission::query()->firstOrCreate(['name' => 'create-workspace']);
        Permission::query()->firstOrCreate(['name' => 'update-workspace']);
        Permission::query()->firstOrCreate(['name' => 'delete-workspace']);
        Permission::query()->firstOrCreate(['name' => 'list-workspace']);

        Permission::query()->firstOrCreate(['name' => 'create-invitation']);
        Permission::query()->firstOrCreate(['name' => 'update-invitation']);
        Permission::query()->firstOrCreate(['name' => 'delete-invitation']);
        Permission::query()->firstOrCreate(['name' => 'list-invitation']);

        Permission::query()->firstOrCreate(['name' => 'create-product-category']);
        Permission::query()->firstOrCreate(['name' => 'update-product-category']);
        Permission::query()->firstOrCreate(['name' => 'delete-product-category']);
        Permission::query()->firstOrCreate(['name' => 'list-product-category']);

        Permission::query()->firstOrCreate(['name' => 'create-product']);
        Permission::query()->firstOrCreate(['name' => 'update-product']);
        Permission::query()->firstOrCreate(['name' => 'delete-product']);
        Permission::query()->firstOrCreate(['name' => 'list-product']);

        Permission::query()->firstOrCreate(['name' => 'create-price-type']);
        Permission::query()->firstOrCreate(['name' => 'update-price-type']);
        Permission::query()->firstOrCreate(['name' => 'delete-price-type']);
        Permission::query()->firstOrCreate(['name' => 'list-price-type']);

        Permission::query()->firstOrCreate(['name' => 'create-product-price']);
        Permission::query()->firstOrCreate(['name' => 'update-product-price']);
        Permission::query()->firstOrCreate(['name' => 'delete-product-price']);
        Permission::query()->firstOrCreate(['name' => 'list-product-price']);

        Permission::query()->firstOrCreate(['name' => 'create-user-subscription']);
        Permission::query()->firstOrCreate(['name' => 'update-user-subscription']);
        Permission::query()->firstOrCreate(['name' => 'delete-user-subscription']);
        Permission::query()->firstOrCreate(['name' => 'list-user-subscription']);

        Schema::enableForeignKeyConstraints();
    }
}
