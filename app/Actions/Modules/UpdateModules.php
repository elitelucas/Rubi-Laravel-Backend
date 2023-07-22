<?php

namespace App\Actions\Modules;

use App\Models\Modules;

class UpdateModule
{
    public function handle(Modules $module, array $data): bool|Modules
    {
        $module->forceFill($data);
        if ($module->save()) {
            return $module->refresh();
        }

        return false;
    }
}
