<?php

namespace Database\Seeders;

use App\Models\Collection;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Collection::insert(
            [
                [
                    'id' => 1,
                    'name' => 'Social Media',
                    'short_description' => 'Our social media collection of modules will allow you to be able to create killer content, gather valuable research and insights into all the top social platforms, competitors, and influencers.',
                    'managed_by' => 1,
                    'created_by' => 1,
                    'icon' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id' => 2,
                    'name' => 'SEO',
                    'short_description' => 'This collection contains modules to assist in the SEO content creation, strategy, and insights.',
                    'managed_by' => 1,
                    'created_by' => 1,
                    'icon' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'id' => 3,
                    'name' => 'Writing',
                    'short_description' => 'This collection encompasses modules that assist in writing both short and long format content',
                    'managed_by' => 1,
                    'created_by' => 1,
                    'icon' => null,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ]
        );
    }
}
