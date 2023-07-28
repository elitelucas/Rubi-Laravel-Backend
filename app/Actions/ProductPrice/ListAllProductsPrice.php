<?php

namespace App\Actions\ProductCategory;

use App\Models\ProductCategory;
use App\Traits\PaginatesAndSearches;
use Illuminate\Http\Request;

class ListAllProductsPrice
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
            query: ProductCategory::query(),
            fieldsToSearch: ['name']
        );
    }
}
