<?php

namespace App\Http\Controllers;

use App\Actions\ProductPrice\CreateProductPrice;
use App\Actions\ProductPrice\RemoveProductPrice;
use App\Actions\ProductPrice\UpdateProductPrice;
use App\Actions\ProductPrice\ListAllProductsCategory;
use App\Http\Requests\ProductPriceStoreRequest;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Resources\ProductPriceResource;
use App\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductPriceController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(ProductPrice::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ListAllProductsCategory $listAllProductCategories): AnonymousResourceCollection
    {
        return ProductPriceResource::collection($listAllProductCategories->handle(request: $request));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductPriceStoreRequest $request, CreateProductPrice $productPriceCreator): ProductPriceResource
    {
        $productPrice = $productPriceCreator->handle($request->safe()->toArray());
        return ProductPriceResource::make($productPrice);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductPrice $productPrice): ProductPriceResource
    {
        return ProductPriceResource::make($productPrice);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductPriceStoreRequest $request, ProductPrice $productPrice, UpdateProductPrice $productPriceUpdater): ProductPriceResource
    {
        $updatedProduct = $productPriceUpdater->handle(product: $productPrice, data: $request->safe()->toArray());
        return ProductPriceResource::make($updatedProduct);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductPrice $product, RemoveProductPrice $productPriceRemover): JsonResponse
    {
        if ($productPriceRemover->handle($product)) {
            return response()->json([
                'message' => 'Product price removed sucessfully.',
            ]);
        }

        return response()->json([
            'error' => 'An error occurred removing product price.'
        ]);
    }
}
