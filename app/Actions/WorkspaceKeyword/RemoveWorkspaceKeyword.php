<?php

namespace App\Actions\WorkspaceKeyword;

use App\Models\WorkspaceKeyword;

class RemoveWorkspaceKeyword
{
    public function handle(WorkspaceKeyword $workspaceKeyword): ?bool
    {
        return $workspaceKeyword->delete();
    }
}
