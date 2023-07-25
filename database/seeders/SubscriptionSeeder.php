<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'id' => '1',
                'name' => 'Basic',
                'description' => '10,000 words | 1 Workspace | 1 Collaborator | 3 Personas | 25 Credits',
                'created_by_user_id' => '1',
                'affiliate_price_monthly' => '15.00',
                'affiliate_annual' => '150.00',
                'retail_price_monthly' => '20.00',
                'retail_annual' => '200.00',
                'workspaces' => '1',
                'collaborators' => '1',
                'words' => '10000',
                'credits' => '25',
            ],
            [
                'id' => '2',
                'name' => 'Pro',
                'description' => '25,000 words | 3 Workspace | 3 Collaborator | 10 Personas | 50 Credits',
                'created_by_user_id' => '1',
                'affiliate_price_monthly' => '25.00',
                'affiliate_annual' => '250.00',
                'retail_price_monthly' => '30.00',
                'retail_annual' => '300.00',
                'workspaces' => '3',
                'collaborators' => '3',
                'words' => '25000',
                'credits' => '50',
            ],
            [
                'id' => '3',
                'name' => 'Premium',
                'description' =>
                    '50,000 words | 5 Workspace | 5 Collaborator | UNLIMITED Personas | 100 Credits',
                'created_by_user_id' => '1',
                'affiliate_price_monthly' => '50.00',
                'affiliate_annual' => '500.00',
                'retail_price_monthly' => '60.00',
                'retail_annual' => '600.00',
                'workspaces' => '5',
                'collaborators' => '5',
                'words' => '50000',
                'credits' => '100',
            ],
        ])->map(fn($subscription) => Subscription::updateOrCreate($subscription, $subscription));
    }
}
