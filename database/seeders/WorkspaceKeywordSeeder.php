<?php

namespace Database\Seeders;

use App\Models\WorkspaceKeyword;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkspaceKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'user_id' => '2',
                'workspace_id' => '1',
                'keyword' => 'AI',
            ],
            [
                'user_id' => '2',
                'workspace_id' => '1',
                'keyword' => 'Generative AI',
            ],
            [
                'user_id' => '2',
                'workspace_id' => '1',
                'keyword' => 'Content Creation',
            ],
            [
                'user_id' => '2',
                'workspace_id' => '1',
                'keyword' => 'RUBI',
            ],
            [
                'user_id' => '2',
                'workspace_id' => '1',
                'keyword' => 'RUBI AI',
            ],
            [
                'user_id' => '2',
                'workspace_id' => '1',
                'keyword' => 'FLEX',
            ],
        ])->map(fn($keyword) => WorkspaceKeyword::updateOrCreate($keyword, $keyword));
    }
}
