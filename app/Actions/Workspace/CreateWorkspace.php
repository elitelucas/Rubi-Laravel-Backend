<?php

namespace App\Actions\Workspace;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CreateWorkspace
{
    public function handle(User $user, array $data): Model
    {
        return $user->workspaces()->create($data);
    }
}
