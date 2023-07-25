<?php

namespace Database\Seeders;

use App\Models\UserSubscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'user_id' => '2',
                'subscription_id' => '1',
                'nickname' => 'BitJar - RUBI',
                'short_description' => 'RUBI Product account',
                'activation_date' => '2023-07-20',
                'expiration_date' => '2023-08-19 11:59:59',
                'renewal_date' => '2023-08-20',
                'active' => true,
            ],
            [
                'user_id' => '2',
                'subscription_id' => '3',
                'nickname' => 'BitJar - Onyx',
                'short_description' => 'Onyx Product Account',
                'activation_date' => '2023-07-20',
                'expiration_date' => '2023-08-19 11:59:59',
                'renewal_date' => '2023-08-20',
                'active' => true,
            ],
            [
                'user_id' => '3',
                'subscription_id' => '2',
                'nickname' => 'Dixon 1',
                'short_description' => 'FLEX Account',
                'activation_date' => '2023-07-20',
                'expiration_date' => '2023-08-19 11:59:59',
                'renewal_date' => '2023-08-20',
                'active' => true,
            ],
        ])->map(
            fn($userSubscription) => UserSubscription::updateOrCreate($userSubscription, $userSubscription)
        );
    }
}
