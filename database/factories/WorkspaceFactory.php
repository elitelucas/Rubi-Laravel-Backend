<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\UserSubscription;
use App\Models\Workspace;

class WorkspaceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Workspace::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'customer_user_id' => User::find(3),
            'user_subscription_id' => UserSubscription::factory(),
            'nickname' => $this->faker->word,
            'short_description' => $this->faker->word,
            'active' => $this->faker->boolean,
        ];
    }
}
