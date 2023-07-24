<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Subscription;
use App\Models\User;

class SubscriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subscription::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->realText(),
            'created_by_user_id' => User::factory(),
            'affiliate_price_monthly' => $this->faker->randomFloat(2, 0, 999999.99),
            'retail_price_monthly' => $this->faker->randomFloat(2, 0, 999999.99),
            'affiliate_annual' => $this->faker->randomFloat(2, 0, 999999.99),
            'retail_annual' => $this->faker->randomFloat(2, 0, 999999.99),
            'workspaces' => $this->faker->randomNumber(),
            'collaborators' => $this->faker->randomNumber(),
            'words' => $this->faker->randomNumber(),
            'credits' => $this->faker->randomNumber(),
        ];
    }
}
