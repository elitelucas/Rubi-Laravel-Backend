<?php

namespace App\Actions\Modules;

use App\Models\Module;

class CreateModules
{
    public function handle(array $data): Module
    {
        return Module::create($data);
    }
}
