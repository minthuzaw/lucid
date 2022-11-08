<?php

namespace App\Domains\Product\Jobs;

use App\Data\Models\Product;
use Lucid\Units\Job;

class IndexProductsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return Product::all()->sortByDesc('id');
    }
}
