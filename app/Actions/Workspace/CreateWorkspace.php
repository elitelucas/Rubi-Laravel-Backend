<?php

namespace App\Actions\Workspace;

use App\Models\User;
use App\Models\Workspace;
use Illuminate\Database\Eloquent\Model;

class CreateWorkspace
{
    public function handle(array $data): Model
    {
        return Workspace::create($data);
    }
}
