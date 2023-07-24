<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Subscription;
use App\Models\User;
use App\Models\UserSubscription;

class UserSubscriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserSubscription::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::find(1),
            'subscription_id' => Subscription::factory(),
            'nickname' => $this->faker->word,
            'short_description' => $this->faker->word,
            'activation_date' => $this->faker->dateTime(),
            'expiration_date' => $this->faker->dateTime(),
            'renewal_date' => $this->faker->dateTime(),
            'active' => $this->faker->boolean,
        ];
    }
}
