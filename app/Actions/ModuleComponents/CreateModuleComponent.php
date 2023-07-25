<?php

namespace App\Actions\ModuleComponents;

use App\Models\Component;
use Illuminate\Database\Eloquent\Collection;

class CreateModuleComponent
{
    public function handle(array $data): Component
    {
        return Component::create($data);
    }
}
