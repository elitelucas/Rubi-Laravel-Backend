<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProductController
 */
class ProductControllerTest extends TestCase
{
    use AdditionalAssertions, WithFaker;

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProductController::class,
            'store',
            \App\Http\Requests\ProductStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_behaves_as_expected(): void
    {
        $name = $this->faker->name;
        $description = $this->faker->text;
        $long_description = $this->faker->text;
        $category_id = $this->faker->numberBetween(-100000, 100000);
        $active = $this->faker->boolean;
        $recurring = $this->faker->boolean;
        $qv = $this->faker->randomFloat(/** decimal_attributes **/);
        $cv = $this->faker->randomFloat(/** decimal_attributes **/);
        $pv = $this->faker->randomFloat(/** decimal_attributes **/);
        $qc = $this->faker->randomFloat(/** decimal_attributes **/);
        $ac = $this->faker->randomFloat(/** decimal_attributes **/);
        $affiliate_price = $this->faker->randomFloat(/** decimal_attributes **/);
        $retail_price = $this->faker->randomFloat(/** decimal_attributes **/);
        $affiliate_monthly_price = $this->faker->randomFloat(/** decimal_attributes **/);
        $affiliate_annual_price = $this->faker->randomFloat(/** decimal_attributes **/);
        $retail_monthly_price = $this->faker->randomFloat(/** decimal_attributes **/);
        $retail_annual_price = $this->faker->randomFloat(/** decimal_attributes **/);

        $response = $this->post(route('product.store'), [
            'name' => $name,
            'description' => $description,
            'long_description' => $long_description,
            'category_id' => $category_id,
            'active' => $active,
            'recurring' => $recurring,
            'qv' => $qv,
            'cv' => $cv,
            'pv' => $pv,
            'qc' => $qc,
            'ac' => $ac,
            'affiliate_price' => $affiliate_price,
            'retail_price' => $retail_price,
            'affiliate_monthly_price' => $affiliate_monthly_price,
            'affiliate_annual_price' => $affiliate_annual_price,
            'retail_monthly_price' => $retail_monthly_price,
            'retail_annual_price' => $retail_annual_price,
        ]);
    }
}
