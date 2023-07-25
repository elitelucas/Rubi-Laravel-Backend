<?php

namespace Database\Seeders;

use App\Models\Collaborator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollaboratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'id' => '1',
                'user_id' => '4',
                'customer_user_id' => '2',
                'active' => true,
            ],
            [
                'id' => '2',
                'user_id' => '5',
                'customer_user_id' => '3',
                'active' => true,
            ],
            [
                'id' => '3',
                'user_id' => '6',
                'customer_user_id' => '3',
                'active' => true,
            ],
        ])->map(fn($collaborator) => Collaborator::updateOrCreate($collaborator, $collaborator));
    }
}
