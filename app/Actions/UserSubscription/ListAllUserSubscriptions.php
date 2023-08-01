<?php

namespace App\Actions\UserSubscription;

use App\Enums\RoleEnum;
use App\Models\User;
use App\Models\UserSubscription;
use App\Traits\PaginatesAndSearches;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListAllUserSubscriptions
{
    use PaginatesAndSearches;

    public function handle(Request $request): Collection|LengthAwarePaginator|array
    {
        return $this->addPaginationAndSearch(
            request: $request,
            query: UserSubscription::query()->where('active', true)->with(['user', 'subscription']),
            fieldsToSearch: ['nickname', 'short_description']
        );
    }
}
