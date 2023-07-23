<?php

namespace App\Actions\ModuleComponents;

use App\Models\Components;
use Illuminate\Database\Eloquent\Collection;

class CreateModuleComponent
{
    public function handle(array $data): Components
    {
        return Components::create($data);
    }
}
