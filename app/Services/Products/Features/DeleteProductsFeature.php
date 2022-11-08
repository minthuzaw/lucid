<?php

namespace App\Services\Products\Features;

use App\Domains\Product\Jobs\DeleteProductsJob;
use App\Helpers\JsonResponder;
use Lucid\Units\Feature;

class DeleteProductsFeature extends Feature
{
    private object $product;

    public function __construct($product)
    {
        $this->product = $product;
    }

    public function handle(): \Illuminate\Http\JsonResponse
    {
        $product = $this->run(DeleteProductsJob::class, ['product' => $this->product]);

        return JsonResponder::success('success', $product);
    }
}
