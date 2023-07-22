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
        OrderStatus::factory(11)->sequence(
            ['name' => 'Pending'],
            ['name' => 'Processing'],
            ['name' => 'Confirmed'],
            ['name' => 'In Transit'],
            ['name' => 'Out for Delivery'],
            ['name' => 'Delivered'],
            ['name' => 'On Hold'],
            ['name' => 'Cancelled'],
            ['name' => 'Returned'],
            ['name' => 'Completed'],
            ['name' => 'Failed'],
        )->create();
    }
}
