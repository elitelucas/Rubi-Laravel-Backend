<?php

namespace Database\Seeders;

use App\Models\PriceType;
use Carbon\Carbon;
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
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Affiliate',
                'description' => 'Price paid by affiliate members',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Monthly',
                'description' => 'Monthly billing',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Annual',
                'description' => 'Annual Billing',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Quarterly',
                'description' => 'Quarterly Billing',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => '7-Day Trial',
                'description' => 'Free 7 Days then Billing Monthly',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => '3-Day Trial',
                'description' => 'Free 3 Days then Billing Monthly',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => '24 Hour Trial',
                'description ' => 'Free 1 Days then Billing Monthly',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
