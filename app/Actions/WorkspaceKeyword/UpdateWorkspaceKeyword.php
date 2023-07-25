<?php

namespace App\Actions\WorkspaceKeyword;

use App\Models\WorkspaceKeyword;

class UpdateWorkspaceKeyword
{
    public function handle(WorkspaceKeyword $workspaceKeyword, array $data): bool|WorkspaceKeyword
    {
        $workspaceKeyword->forceFill($data);
        if ($workspaceKeyword->save()) {
            return $workspaceKeyword->refresh();
        }

        return false;
    }
}
