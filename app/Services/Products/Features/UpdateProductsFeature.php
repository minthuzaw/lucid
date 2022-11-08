<?php

namespace App\Services\Products\Features;

use App\Domains\Product\Jobs\UpdateProductsJob;
use App\Domains\Product\Requests\UpdateProductRequest;
use App\Helpers\JsonResponder;
use Lucid\Units\Feature;

class UpdateProductsFeature extends Feature
{
    private object $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function handle(UpdateProductRequest $request)
    {
        $products = $this->run(UpdateProductsJob::class, ['product' => $this->product, 'payload' => $request->validated()]);

        return JsonResponder::success('success', $products);
    }
}
