<?php

namespace App\Domains\Author\Jobs;

use Lucid\Units\Job;

class ShowAuthorJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private object $author;

    public function __construct($author)
    {
        $this->author = $author;
    }

    /**
     * Execute the job.
     *
     * @return object
     */
    public function handle()
    {
        return $this->author;
    }
}
