<?php

namespace App\Services\Products\Features;

use App\Domains\Product\Jobs\StoreProductsJob;
use App\Domains\Product\Requests\StoreProductRequest;
use App\Helpers\JsonResponder;
use Lucid\Units\Feature;

class StoreProductsFeature extends Feature
{
    public function handle(StoreProductRequest $request)
    {
        $products = $this->run(StoreProductsJob::class, ['products' => $request->validated()]);

        return JsonResponder::success('success', $products);
    }
}
