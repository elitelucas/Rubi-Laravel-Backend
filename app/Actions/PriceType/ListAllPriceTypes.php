<?php

namespace App\Actions\PriceType;

use App\Models\PriceType;
use App\Traits\PaginatesAndSearches;
use Illuminate\Http\Request;

class ListAllPriceTypes
{
    use PaginatesAndSearches;
    /**
     * List all products
     *
     * @param Request $request
     * @return mixed
     */
    public function handle(Request $request): mixed
    {
        return $this->addPaginationAndSearch(
            request: $request,
            query: PriceType::query(),
            fieldsToSearch: ['name']
        );
    }
}
