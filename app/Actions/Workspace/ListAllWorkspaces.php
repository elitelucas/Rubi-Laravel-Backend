<?php

namespace App\Actions\Workspace;

use App\Models\User;
use App\Traits\PaginatesAndSearches;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ListAllWorkspaces
{
    use PaginatesAndSearches;
    public function handle(User $user, Request $request): Collection|LengthAwarePaginator|array
    {
        return $this->addPaginationAndSearch(
            request: $request,
            query: $user->workspaces()->with(['userSubscription'])->getQuery(),
            fieldsToSearch: ['nickname', 'short_description']
        );
    }
}
