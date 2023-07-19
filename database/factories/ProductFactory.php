<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'long_description' => $this->faker->text,
            'category_id' => ProductCategory::factory(),
            'active' => $this->faker->boolean,
            'affiliate_monthly_price' => $this->faker->randomFloat(2, 0, 999999.99),
            'affiliate_annual_price' => $this->faker->randomFloat(2, 0, 999999.99),
            'retail_monthly_price' => $this->faker->randomFloat(2, 0, 999999.99),
            'retail_annual_price' => $this->faker->randomFloat(2, 0, 999999.99),
            'recurring' => $this->faker->boolean,
            'qv' => $this->faker->randomFloat(2, 0, 999999.99),
            'cv' => $this->faker->randomFloat(2, 0, 999999.99),
            'pv' => $this->faker->randomFloat(2, 0, 999999.99),
            'qc' => $this->faker->randomFloat(2, 0, 999999.99),
            'ac' => $this->faker->randomFloat(2, 0, 999999.99),
        ];
    }
}
