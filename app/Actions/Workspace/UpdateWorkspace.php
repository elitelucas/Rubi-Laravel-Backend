<?php

namespace App\Actions\Workspace;

use App\Models\Workspace;

class UpdateWorkspace
{
    public function handle(Workspace $workspace, array $data): bool|Workspace
    {
        if ($workspace->update($data)) {
            return $workspace->refresh();
        }

        return false;
    }
}
