<?php

namespace App\Http\Controllers;

use App\Actions\Collection\CreateCollection;
use App\Actions\Collection\ListAllCollections;
use App\Actions\Collection\RemoveCollection;
use App\Actions\Collection\UpdateCollection;
use App\Http\Requests\CollectionStoreRequest;
use App\Http\Requests\CollectionUpdateRequest;
use App\Http\Resources\CollectionResource;
use App\Models\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CollectionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Collection::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(
        Request $request,
        ListAllCollections $listAllCollections
    ): AnonymousResourceCollection {
        return CollectionResource::collection($listAllCollections->handle(request: $request));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        CollectionStoreRequest $request,
        CreateCollection $collectionCreator
    ): CollectionResource {
        $collection = $collectionCreator->handle($request->safe()->toArray());
        return CollectionResource::make($collection);
    }

    /**
     * Display the specified resource.
     */
    public function show(Collection $collection): CollectionResource
    {
        return CollectionResource::make($collection);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CollectionUpdateRequest $request,
        Collection $collection,
        UpdateCollection $collectionUpdater
    ): CollectionResource
    {
        $updatedCollection = $collectionUpdater->handle($collection, $request->safe()->toArray());
        return CollectionResource::make($updatedCollection);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collection $collection, RemoveCollection $collectionRemover): JsonResponse
    {
        if ($collectionRemover->handle($collection)) {
            return response()->json([
                'message' => 'Collection removed sucessfully.',
            ]);
        }

        return response()->json([
            'error' => 'An error occurred removing collection.'
        ]);
    }
}
