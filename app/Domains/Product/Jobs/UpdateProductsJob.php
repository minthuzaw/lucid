<?php

namespace App\Domains\Product\Jobs;

use App\Data\Models\Product;
use Lucid\Units\Job;

class UpdateProductsJob extends Job
{
    private object $product;

    private array $payload;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($product, $payload)
    {
        $this->product = $product;
        $this->payload = $payload;
    }

    /**
     * Execute the job.
     *
     * @return object
     */
    public function handle()
    {
        //$product = Product::findOrFail($this->product);
        $this->product->update($this->payload);

        return $this->product;
    }
}
