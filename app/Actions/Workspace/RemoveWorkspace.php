<?php

namespace App\Actions\Workspace;

use App\Models\Workspace;

class RemoveWorkspace
{
    public function handle(Workspace $workspace): ?bool
    {
        return $workspace->delete();
    }
}
