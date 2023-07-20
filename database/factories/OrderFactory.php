<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Client;
use App\Models\Order;
use App\Models\User;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::find(1),
            'client_id' => Client::find(1),
            'words_qty' => $this->faker->randomNumber(),
            'credit_qty' => $this->faker->randomNumber(),
            'storage_qty' => $this->faker->randomNumber(),
            'total' => $this->faker->randomNumber(),
        ];
    }
}
