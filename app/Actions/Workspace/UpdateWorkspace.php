<?php

namespace App\Actions\Workspace;

use App\Models\Workspace;

class UpdateWorkspace
{
    public function handle(Workspace $workspace, array $data): bool|Workspace
    {
        $user = $workspace->customer;
        //delete current keywords
        $workspace->keywords()->delete();
        //store new keywords
        array_walk($data["keywords"], function (&$keyword) use ($workspace, $user) {
            $workspace->keywords()->create([
                'user_id' => $user->id,
                'keyword' => $keyword
            ]);
        });

        if ($workspace->update($data)) {
            return $workspace->refresh();
        }

        return false;
    }
}
