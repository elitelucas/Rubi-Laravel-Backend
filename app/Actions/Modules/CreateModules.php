<?php

namespace App\Actions\Modules;

use App\Models\Modules;

class CreateModules
{
    public function handle(array $data): Modules
    {
        return Modules::create($data);
    }
}
