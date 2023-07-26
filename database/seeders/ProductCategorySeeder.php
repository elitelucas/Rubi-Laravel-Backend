<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductCategory::insert([
            ['name' => 'Words', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Credits', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Storage', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Apparel', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Collections', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
    }
}
