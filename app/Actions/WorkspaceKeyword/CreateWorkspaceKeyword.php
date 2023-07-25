<?php

namespace App\Actions\WorkspaceKeyword;

use App\Models\Workspace;
use Illuminate\Database\Eloquent\Model;

class CreateWorkspaceKeyword
{
    public function handle(Workspace $workspace, array $data): Model
    {
        return $workspace->keywords()->create($data);
    }
}
