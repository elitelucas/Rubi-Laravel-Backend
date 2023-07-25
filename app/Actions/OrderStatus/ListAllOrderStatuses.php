<?php

namespace App\Actions\OrderStatus;

use App\Models\OrderStatus;
use App\Traits\PaginatesAndSearches;
use Illuminate\Http\Request;

class ListAllOrderStatuses
{
    use PaginatesAndSearches;
    /**
     * List all orderStatuss
     *
     * @param Request $request
     * @return mixed
     */
    public function handle(Request $request): mixed
    {
        return $this->addPaginationAndSearch(
            request: $request,
            query: OrderStatus::query(),
            fieldsToSearch: ['name']
        );
    }
}
