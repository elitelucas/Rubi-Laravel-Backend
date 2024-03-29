<?php

namespace App\Http\Controllers;

use App\Actions\ProductCategory\CreateProductCategory;
use App\Actions\ProductCategory\ListAllProductsCategory;
use App\Actions\ProductCategory\RemoveProductCategory;
use App\Actions\ProductCategory\UpdateProductCategory;
use App\Http\Requests\ProductCategoryStoreRequest;
use App\Http\Resources\ProductCategoryResource;
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
    public function index(Request $request, ListAllProductsCategory $listAllProductCategories): AnonymousResourceCollection
    {
        return ProductCategoryResource::collection($listAllProductCategories->handle(request: $request));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryStoreRequest $request, CreateProductCategory $productCategoryCreator): ProductCategoryResource
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
    public function update(ProductCategoryStoreRequest $request, ProductCategory $productCategory, UpdateProductCategory $productCategoryUpdater): ProductCategoryResource
    {
        $updatedProduct = $productCategoryUpdater->handle(product: $productCategory, data: $request->safe()->toArray());
        return ProductCategoryResource::make($updatedProduct);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $product, RemoveProductCategory $productCategoryRemover): JsonResponse
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
