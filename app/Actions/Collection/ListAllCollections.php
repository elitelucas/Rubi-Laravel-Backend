<?php

namespace App\Actions\Collection;

use App\Models\Collection;
use App\Traits\PaginatesAndSearches;
use Illuminate\Http\Request;

class ListAllCollections
{
    use PaginatesAndSearches;

    /**
     * List all collections
     *
     * @param Request $request
     * @return mixed
     */
    public function handle(Request $request): mixed
    {
        return $this->addPaginationAndSearch(
            request: $request,
            query: Collection::query(),
            fieldsToSearch: ['name']
        );
    }
}
