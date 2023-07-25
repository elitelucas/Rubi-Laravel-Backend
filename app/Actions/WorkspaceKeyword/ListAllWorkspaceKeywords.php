<?php

namespace App\Actions\WorkspaceKeyword;

use App\Models\User;
use App\Models\Workspace;
use App\Models\WorkspaceKeyword;
use App\Traits\PaginatesAndSearches;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ListAllWorkspaceKeywords
{
    use PaginatesAndSearches;
    public function handle(Workspace $workspace, Request $request): Collection|LengthAwarePaginator|array
    {
        return $this->addPaginationAndSearch(
            request: $request,
            query: $workspace->keywords()->getQuery(),
            fieldsToSearch: ['keyword']
        );
    }
}
