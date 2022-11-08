<?php

namespace App\Domains\Product\Jobs;

use Lucid\Units\Job;

class DeleteProductsJob extends Job
{
    private object $product;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($product)
    {
        $this->product = $product;
    }

    /**
     * Execute the job.
     *
     * @return bool
     */
    public function handle(): bool
    {
        return $this->product->delete();
    }
}
