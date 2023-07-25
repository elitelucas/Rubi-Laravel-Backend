<?php

namespace Database\Seeders;

use App\Models\Workspace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkspaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'customer_user_id' => '2',
                'user_subscription_id' => '1',
                'nickname' => 'BitJar Labs',
                'short_description' => 'Software',
                'active' => true,
            ],
            [
                'customer_user_id' => '2',
                'user_subscription_id' => '2',
                'nickname' => 'Nike',
                'short_description' => 'Shoes',
                'active' => true,
            ],
            [
                'customer_user_id' => '3',
                'user_subscription_id' => '3',
                'nickname' => 'Adidas',
                'short_description' => 'Shoes',
                'active' => true,
            ],
        ])->map(fn($workspace) => Workspace::updateOrCreate($workspace, $workspace));
    }
}
