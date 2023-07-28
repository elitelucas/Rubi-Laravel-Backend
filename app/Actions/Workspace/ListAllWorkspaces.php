<?php

namespace App\Actions\Workspace;

use App\Models\User;
use App\Models\Workspace;
use App\Traits\PaginatesAndSearches;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ListAllWorkspaces
{
    use PaginatesAndSearches;
    public function handle(Request $request): Collection|LengthAwarePaginator|array
    {
        return $this->addPaginationAndSearch(
            request: $request,
            query: Workspace::query()->with(['userSubscription']),
            fieldsToSearch: ['nickname', 'short_description']
        );
    }
}
