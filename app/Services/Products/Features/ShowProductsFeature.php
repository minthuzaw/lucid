<?php

namespace App\Services\Products\Features;

use App\Domains\Product\Jobs\ShowProductsJob;
use App\Helpers\JsonResponder;
use Lucid\Units\Feature;

class ShowProductsFeature extends Feature
{
    private object $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function handle(): \Illuminate\Http\JsonResponse
    {
        $product = $this->run(ShowProductsJob::class, ['product' => $this->product]);

        return JsonResponder::success('success', $product);
    }
}
