<?php

namespace App\Http\Controllers;

use App\Actions\Product\CreateProduct;
use App\Actions\Product\ListAllProducts;
use App\Actions\Product\RemoveProduct;
use App\Actions\Product\UpdateProduct;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ListAllProducts $listAllProducts): AnonymousResourceCollection
    {
        return ProductResource::collection($listAllProducts->handle(request: $request));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request, CreateProduct $productCreator): ProductResource
    {
        $product = $productCreator->handle($request->safe()->toArray());
        return ProductResource::make($product->load('category'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): ProductResource
    {
        return ProductResource::make($product->load('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductStoreRequest $request, Product $product, UpdateProduct $productUpdater): ProductResource
    {
        $updatedProduct = $productUpdater->handle(product: $product, data: $request->safe()->toArray());
        return ProductResource::make($updatedProduct);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, RemoveProduct $productRemover): JsonResponse
    {
        if ($productRemover->handle($product)) {
            return response()->json([
                'message' => 'Product removed sucessfully.',
            ]);
        }

        return response()->json([
            'error' => 'An error occurred removing product.'
        ]);
    }
}
