<?php

namespace App\Domains\Book\Jobs;

use Lucid\Units\Job;

class DestroyBookJob extends Job
{
    private object $book;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($book)
    {
        $this->book = $book;
    }

    /**
     * Execute the job.
     *
     * @unauthenticated
     *
     * @return void
     */
    public function handle()
    {
        return $this->book->delete();
    }
}
