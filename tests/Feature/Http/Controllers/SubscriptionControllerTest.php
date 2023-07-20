<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SubscriptionController
 */
class SubscriptionControllerTest extends TestCase
{
    use AdditionalAssertions, WithFaker;

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SubscriptionController::class,
            'store',
            \App\Http\Requests\SubscriptionStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_behaves_as_expected(): void
    {
        $name = $this->faker->name;
        $created_by_user_id = $this->faker->numberBetween(-100000, 100000);
        $whlse_price_monthly = $this->faker->randomFloat(/** decimal_attributes **/);
        $retail_price_monthly = $this->faker->randomFloat(/** decimal_attributes **/);
        $whsle_annual = $this->faker->randomFloat(/** decimal_attributes **/);
        $retail_annual = $this->faker->randomFloat(/** decimal_attributes **/);
        $workspaces = $this->faker->numberBetween(-10000, 10000);
        $collaborators = $this->faker->numberBetween(-10000, 10000);
        $words = $this->faker->numberBetween(-10000, 10000);
        $credits = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('subscription.store'), [
            'name' => $name,
            'created_by_user_id' => $created_by_user_id,
            'whlse_price_monthly' => $whlse_price_monthly,
            'retail_price_monthly' => $retail_price_monthly,
            'whsle_annual' => $whsle_annual,
            'retail_annual' => $retail_annual,
            'workspaces' => $workspaces,
            'collaborators' => $collaborators,
            'words' => $words,
            'credits' => $credits,
        ]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SubscriptionController::class,
            'update',
            \App\Http\Requests\SubscriptionUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected(): void
    {
        $subscription = Subscription::factory()->create();
        $name = $this->faker->name;
        $created_by_user_id = $this->faker->numberBetween(-100000, 100000);
        $whlse_price_monthly = $this->faker->randomFloat(/** decimal_attributes **/);
        $retail_price_monthly = $this->faker->randomFloat(/** decimal_attributes **/);
        $whsle_annual = $this->faker->randomFloat(/** decimal_attributes **/);
        $retail_annual = $this->faker->randomFloat(/** decimal_attributes **/);
        $workspaces = $this->faker->numberBetween(-10000, 10000);
        $collaborators = $this->faker->numberBetween(-10000, 10000);
        $words = $this->faker->numberBetween(-10000, 10000);
        $credits = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('subscription.update', $subscription), [
            'name' => $name,
            'created_by_user_id' => $created_by_user_id,
            'whlse_price_monthly' => $whlse_price_monthly,
            'retail_price_monthly' => $retail_price_monthly,
            'whsle_annual' => $whsle_annual,
            'retail_annual' => $retail_annual,
            'workspaces' => $workspaces,
            'collaborators' => $collaborators,
            'words' => $words,
            'credits' => $credits,
        ]);
    }
}
