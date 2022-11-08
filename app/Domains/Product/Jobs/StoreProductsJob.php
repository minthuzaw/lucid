<?php

namespace App\Domains\Product\Jobs;

use App\Data\Models\Product;
use Lucid\Units\Job;

class StoreProductsJob extends Job
{
    private array $products;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($products)
    {
        $this->products = $products;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return Product::create($this->products);
    }
}
