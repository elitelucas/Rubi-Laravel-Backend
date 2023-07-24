<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pending, Processing, Confirmed, In Transit, Out for Delivery, Delivered, On Hold, Cancelled, Returned, Completed, Failed
        OrderStatus::insert([
            ['name' => 'Pending', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Processing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Confirmed', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'In Transit', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Out for Delivery', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delivered', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'On Hold', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cancelled', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Returned', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Completed', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Failed', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
