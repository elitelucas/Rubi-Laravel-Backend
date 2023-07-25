<?php

namespace App\Actions\Modules;

use App\Models\Module;

class UpdateModule
{
    public function handle(Module $module, array $data): bool|Module
    {
        if ($module->update($data)) {
            return $module->refresh();
        }

        return false;
    }
}
