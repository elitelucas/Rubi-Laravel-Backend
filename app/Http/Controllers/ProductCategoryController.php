<?php

namespace App\Http\Controllers;

use App\Actions\ProductCategory\CreateProductPrice;
use App\Actions\ProductCategory\RemoveProductPrice;
use App\Actions\ProductCategory\UpdateProductPrice;
use App\Actions\ProductCategory\ListAllProductsPrice;
use App\Http\Requests\ProductCategoryStoreRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Resources\ProductCategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\ProductCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ProductCategory::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ListAllProductsPrice $listAllProductCategories): AnonymousResourceCollection
    {
        return ProductCategoryResource::collection($listAllProductCategories->handle(request: $request));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryStoreRequest $request, CreateProductPrice $productCategoryCreator): ProductCategoryResource
    {
        $productCategory = $productCategoryCreator->handle($request->safe()->toArray());
        return ProductCategoryResource::make($productCategory);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory): ProductCategoryResource
    {
        return ProductCategoryResource::make($productCategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCategoryStoreRequest $request, ProductCategory $productCategory, UpdateProductPrice $productCategoryUpdater): ProductCategoryResource
    {
        $updatedProduct = $productCategoryUpdater->handle(product: $productCategory, data: $request->safe()->toArray());
        return ProductCategoryResource::make($updatedProduct);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $product, RemoveProductPrice $productCategoryRemover): JsonResponse
    {
        if ($productCategoryRemover->handle($product)) {
            return response()->json([
                'message' => 'Product category removed sucessfully.',
            ]);
        }

        return response()->json([
            'error' => 'An error occurred removing product category.'
        ]);
    }
}
