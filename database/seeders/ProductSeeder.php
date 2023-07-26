<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            [
                'name' => 'Words',
                'description' => '10.000 will be added to users word bank account.',
                'category_id' => 1,
                'active' => true,
                'recurring' => false,
            ],
            [
                'name' => 'Credits',
                'description' => '25 credits will be added to users credit account',
                'category_id' => 1,
                'active' => true,
                'recurring' => false,
            ],
            [
                'name' => 'Storage',
                'description' => '2GB additional Storage to hold saved content and media.',
                'category_id' => 1,
                'active' => true,
                'recurring' => true,
            ]
        ]);
    }
}
