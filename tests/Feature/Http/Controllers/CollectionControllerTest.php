<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Collection;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CollectionController
 */
class CollectionControllerTest extends TestCase
{
    use AdditionalAssertions, WithFaker;

    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CollectionController::class,
            'store',
            \App\Http\Requests\CollectionStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_behaves_as_expected(): void
    {
        $name = $this->faker->name;
        $short_description = $this->faker->word;
        $managed_by = $this->faker->numberBetween(-100000, 100000);
        $created_by = $this->faker->numberBetween(-100000, 100000);
        $icon = $this->faker->word;

        $response = $this->post(route('collection.store'), [
            'name' => $name,
            'short_description' => $short_description,
            'managed_by' => $managed_by,
            'created_by' => $created_by,
            'icon' => $icon,
        ]);
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CollectionController::class,
            'update',
            \App\Http\Requests\CollectionUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_behaves_as_expected(): void
    {
        $collection = Collection::factory()->create();
        $name = $this->faker->name;
        $short_description = $this->faker->word;
        $managed_by = $this->faker->numberBetween(-100000, 100000);
        $created_by = $this->faker->numberBetween(-100000, 100000);
        $icon = $this->faker->word;

        $response = $this->put(route('collection.update', $collection), [
            'name' => $name,
            'short_description' => $short_description,
            'managed_by' => $managed_by,
            'created_by' => $created_by,
            'icon' => $icon,
        ]);
    }
}
