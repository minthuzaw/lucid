<?php

namespace App\Services\Products\Features;

use App\Domains\Product\Jobs\IndexProductsJob;
use App\Helpers\JsonResponder;
use Illuminate\Http\JsonResponse;
use Lucid\Units\Feature;

class IndexProductsFeature extends Feature
{
    public function handle(): JsonResponse
    {
        $products = $this->run(IndexProductsJob::class);

        return JsonResponder::success('success', $products);
    }
}
