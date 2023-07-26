<?php

namespace Database\Seeders;

use App\Models\PriceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PriceType::insert([
            [
                'name' => 'Retail',
                'description' => 'Price paid by retail customers',
                'created_at' => '2023-07-20 12:04:00:00',
                'updated_at' => '2023-07-20 12:04:00:00',
            ],
            [
                'name' => 'Affiliate',
                'description' => 'Price paid by affiliate members',
                'created_at' => '2023-07-20 12:04:00:00',
                'updated_at' => '2023-07-20 12:04:00:00',
            ],
            [
                'name' => 'Monthly',
                'description' => 'Monthly billing',
                'created_at' => '2023-07-20 12:04:00:00',
                'updated_at' => '2023-07-20 12:04:00:00',
            ],
            [
                'name' => 'Annual',
                'description' => 'Annual Billing',
                'created_at' => '2023-07-20 12:04:00:00',
                'updated_at' => '2023-07-20 12:04:00:00',
            ],
            [
                'name' => 'Quarterly',
                'description' => 'Quarterly Billing',
                'created_at' => '2023-07-20 12:04:00:00',
                'updated_at' => '2023-07-20 12:04:00:00',
            ],
            [
                'name' => '7-Day Trial',
                'description' => 'Free 7 Days then Billing Monthly',
                'created_at' => '2023-07-20 12:04:00:00',
                'updated_at' => '2023-07-20 12:04:00:00',
            ],
            [
                'name' => '3-Day Trial',
                'description' => 'Free 3 Days then Billing Monthly',
                'created_at' => '2023-07-20 12:04:00:00',
                'updated_at' => '2023-07-20 12:04:00:00',
            ],
            [
                'name' => '24 Hour Trial',
                'description ' => 'Free 1 Days then Billing Monthly',
                'created_at' => '2023-07-20 12:04:00:00',
                'updated_at' => '2023-07-20 12:04:00:00',
            ]
        ]);
    }
}
