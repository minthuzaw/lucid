<?php

namespace App\Services\Products\Http\Controllers;

use App\Data\Models\Product;
use App\Services\Products\Features\DeleteProductsFeature;
use App\Services\Products\Features\IndexProductsFeature;
use App\Services\Products\Features\ShowProductsFeature;
use App\Services\Products\Features\StoreProductsFeature;
use App\Services\Products\Features\UpdateProductsFeature;
use Lucid\Units\Controller;

class ProductController extends Controller
{
    /**
     * Index
     *
     * @group Product Management
     */
    public function index()
    {
        return $this->serve(IndexProductsFeature::class);
    }

    /**
     * Store
     *
     * @group Product Management
     * @unauthenticated
     *
     * @bodyParam name string required The name of the product. Example: product name
     */
    public function store()
    {
        return $this->serve(StoreProductsFeature::class);
    }

    /**
     * Update
     *
     * @group Product Management
     * @unauthenticated
     *
     * @bodyParam name string required The name of the product. Example: product name
     */
    public function update(Product $product)
    {
        //return Benchmark::measure(fn() =>  $this->serve(UpdateProductsFeature::class, ['product' => $product]));

        return $this->serve(UpdateProductsFeature::class, ['product' => $product]);
    }

    /**
     * Show
     *
     * @group Product Management
     * @unauthenticated
     */
    public function show(Product $product)
    {
        return $this->serve(ShowProductsFeature::class, ['product' => $product]);
    }

    /**
     * Delete
     *
     * @group Product Management
     * @unauthenticated
     */
    public function destroy(Product $product)
    {
        return $this->serve(DeleteProductsFeature::class, ['product' => $product]);
    }
}
