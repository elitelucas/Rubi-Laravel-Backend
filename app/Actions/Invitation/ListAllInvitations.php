<?php

namespace App\Actions\Invitation;

use App\Models\User;
use App\Traits\PaginatesAndSearches;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ListAllInvitations
{
    use PaginatesAndSearches;
    public function handle(User $user, Request $request): Collection|LengthAwarePaginator|array
    {
        return $this->addPaginationAndSearch(
            request: $request,
            query: $user->invitations()->getQuery(),
            fieldsToSearch: ['firstname', 'lastname']
        );
    }
}
