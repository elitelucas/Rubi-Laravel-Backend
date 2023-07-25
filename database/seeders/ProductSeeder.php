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
                'long_description' => '10.000 words will be added to the users word bank account.',
                'category_id' => 1,
                'active' => true,
                'affiliate_price' => 10.0,
                'retail_price' => 12.0,
                'affiliate_monthly_price' => null,
                'affiliate_annual_price' => null,
                'retail_monthly_price' => null,
                'retail_annual_price' => null,
                'recurring' => false,
                'qv' => 0,
                'cv' => 10,
                'pv' => 0,
                'qc' => 0,
                'ac' => 0,
            ],
            [
                'name' => 'Credits',
                'description' => '25 credits will be added to users credit account',
                'long_description' => '25 credits will be added to users credit account',
                'category_id' => 1,
                'active' => true,
                'affiliate_price' => 10.0,
                'retail_price' => 12.0,
                'affiliate_monthly_price' => null,
                'affiliate_annual_price' => null,
                'retail_monthly_price' => null,
                'retail_annual_price' => null,
                'recurring' => false,
                'qv' => 0,
                'cv' => 10,
                'pv' => 0,
                'qc' => 0,
                'ac' => 0,
            ],
            [
                'name' => 'Storage',
                'description' => '2GB additional Storage to hold saved content and media.',
                'long_description' => '2GB additional Storage to hold saved content and media.',
                'category_id' => 1,
                'active' => true,
                'affiliate_price' => 5.0,
                'retail_price' => 6.0,
                'affiliate_monthly_price' => null,
                'affiliate_annual_price' => null,
                'retail_monthly_price' => null,
                'retail_annual_price' => null,
                'recurring' => true,
                'qv' => 0,
                'cv' => 5,
                'pv' => 0,
                'qc' => 0,
                'ac' => 0,
            ]
        ]);
    }
}
