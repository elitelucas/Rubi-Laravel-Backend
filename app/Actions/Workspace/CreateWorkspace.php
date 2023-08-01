<?php

namespace App\Actions\Workspace;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CreateWorkspace
{
    public function handle(User $user, array $data): Model
    {
        $data["customer_user_id"] = $user->id;
        $newWorkspace =  $user->workspaces()->create($data);

        array_walk($data["keywords"], function (&$keyword) use ($newWorkspace, $user) {
            $newWorkspace->keywords()->create([
                'user_id' => $user->id,
                'keyword' => $keyword
            ]);
        });

        return $newWorkspace;
    }
}
