<?php

namespace App\Http\Controllers;

use App\Actions\PriceType\CreatePriceType;
use App\Actions\PriceType\RemovePriceType;
use App\Actions\PriceType\UpdatePriceType;
use App\Actions\PriceType\ListAllPriceTypes;
use App\Http\Requests\ProductCategoryStoreRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Resources\PriceTypeResource;
use App\Http\Resources\ProductCategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\PriceType;
use App\Models\ProductCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PriceTypeController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(PriceType::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ListAllPriceTypes $listAllProductCategories): AnonymousResourceCollection
    {
        return PriceTypeResource::collection($listAllProductCategories->handle(request: $request));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryStoreRequest $request, CreatePriceType $productCategoryCreator): ProductCategoryResource
    {
        $productCategory = $productCategoryCreator->handle($request->safe()->toArray());
        return PriceTypeResource::make($productCategory);
    }

    /**
     * Display the specified resource.
     */
    public function show(PriceType $priceType): PriceTypeResource
    {
        return PriceTypeResource::make($priceType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryStoreRequest $request, ProductCategory $productCategory, UpdatePriceType $productCategoryUpdater): ProductCategoryResource
    {
        $updatedProduct = $productCategoryUpdater->handle(product: $productCategory, data: $request->safe()->toArray());
        return PriceTypeResource::make($updatedProduct);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PriceType $priceType, RemovePriceType $productCategoryRemover): JsonResponse
    {
        if ($productCategoryRemover->handle($priceType)) {
            return response()->json([
                'message' => 'Price type removed sucessfully.',
            ]);
        }

        return response()->json([
            'error' => 'An error occurred removing price type.'
        ]);
    }
}
