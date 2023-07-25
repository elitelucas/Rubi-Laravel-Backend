<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Workspace;
use App\Models\WorkspaceKeyword;

class WorkspaceKeywordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkspaceKeyword::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::findOrFail(3),
            'workspace_id' => Workspace::findOrFail(1),
            'keyword' => $this->faker->word,
        ];
    }
}
