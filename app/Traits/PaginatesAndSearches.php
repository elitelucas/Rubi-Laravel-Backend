<?php

namespace App\Traits;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait PaginatesAndSearches
{
    /**
     * Add search and pagination.
     *
     * @param Request $request
     * @param EloquentBuilder|QueryBuilder $query
     * @param array $fieldsToSearch
     * @return Collection|LengthAwarePaginator|array
     */
    public function addPaginationAndSearch(
        Request $request,
        EloquentBuilder|QueryBuilder $query,
        array $fieldsToSearch
    ): Collection|LengthAwarePaginator|array {
        // Request parameters
        $orderColumn = $request->input(key: 'order_col');
        $orderDirection = $request->input(key: 'order_dir');
        $search = $request->input(key: 'search');
        $perPage = $request->input('per_page');

        $query
            // Ordering
            ->when(
                value: $orderColumn,
                callback: function (EloquentBuilder|QueryBuilder $query, $orderColumn) use ($orderDirection) {
                    $query->orderBy(column: $orderColumn, direction: $orderDirection ?? 'asc');
                }
            )
            // Search
            ->when(
                value: $search,
                callback: function (EloquentBuilder|QueryBuilder $query, $search) use ($fieldsToSearch) {
                    $query->where(function (EloquentBuilder|QueryBuilder $query) use (
                        $search,
                        $fieldsToSearch
                    ) {
                        foreach ($fieldsToSearch as $field) {
                            $query->orWhere(column: $field, operator: 'like', value: "%$search%");
                        }
                    });
                }
            );

        // Only adds pagination if the 'per_page' parameter is set
        return $perPage ? $query->paginate($perPage) : $query->get();
    }
}
