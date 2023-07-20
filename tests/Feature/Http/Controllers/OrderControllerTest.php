<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\OrderController
 */
class OrderControllerTest extends TestCase
{
    use AdditionalAssertions, WithFaker;

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\OrderController::class,
            'store',
            \App\Http\Requests\OrderStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_behaves_as_expected(): void
    {
        $user_id = $this->faker->numberBetween(-100000, 100000);
        $client_id = $this->faker->numberBetween(-100000, 100000);
        $words_qty = $this->faker->numberBetween(-10000, 10000);
        $credit_qty = $this->faker->numberBetween(-10000, 10000);
        $storage_qty = $this->faker->numberBetween(-10000, 10000);
        $total = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('order.store'), [
            'user_id' => $user_id,
            'client_id' => $client_id,
            'words_qty' => $words_qty,
            'credit_qty' => $credit_qty,
            'storage_qty' => $storage_qty,
            'total' => $total,
        ]);
    }
}
