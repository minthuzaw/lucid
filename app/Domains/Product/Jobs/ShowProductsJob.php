<?php

namespace App\Domains\Product\Jobs;

use Lucid\Units\Job;

class ShowProductsJob extends Job
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
     * @return object
     */
    public function handle(): object
    {
        return $this->product;
    }
}
