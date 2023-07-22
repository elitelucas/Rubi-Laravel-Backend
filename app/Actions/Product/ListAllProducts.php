<?php

namespace App\Actions\Product;

use App\Models\Product;
use App\Traits\PaginatesAndSearches;
use Illuminate\Http\Request;

class ListAllProducts
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
            query: Product::with('category'),
            fieldsToSearch: ['name']
        );
    }
}
