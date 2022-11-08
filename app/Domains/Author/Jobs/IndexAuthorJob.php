<?php

namespace App\Domains\Author\Jobs;

use App\Data\Models\Author;
use Lucid\Units\Job;

class IndexAuthorJob extends Job
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
        return Author::all()->sortByDesc('id');
    }
}
