<?php

namespace App\Actions\Subscription;

use App\Models\Subscription;
use App\Traits\PaginatesAndSearches;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ListAllSubscriptions
{
    use PaginatesAndSearches;

    /**
     * List all Subscriptions
     *
     * @param Request $request
     * @return array|LengthAwarePaginator|Collection
     */
    public function handle(Request $request): array|LengthAwarePaginator|Collection
    {
        return $this->addPaginationAndSearch(
            request: $request,
            query: Subscription::query(),
            fieldsToSearch: ['name']
        );
    }
}
