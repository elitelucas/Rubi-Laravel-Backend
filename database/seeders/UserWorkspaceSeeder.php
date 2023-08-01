<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserWorkspaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('user_workspaces')->truncate();

        DB::table('user_workspaces')->insert([
            ['user_id' => 1, 'workspace_id' => 1, 'active' => true],
            ['user_id' => 2, 'workspace_id' => 1, 'active' => false],
            ['user_id' => 3, 'workspace_id' => 1, 'active' => true],
            ['user_id' => 4, 'workspace_id' => 1, 'active' => true],
            ['user_id' => 1, 'workspace_id' => 2, 'active' => true],
            ['user_id' => 3, 'workspace_id' => 2, 'active' => true],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
