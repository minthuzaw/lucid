<?php

namespace App\Domains\Author\Jobs;

use Lucid\Units\Job;

class DestroyAuthorJob extends Job
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
     * @return void
     */
    public function handle()
    {
        return $this->author->delete();
    }
}
