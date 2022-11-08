<?php

namespace App\Domains\Book\Jobs;

use Lucid\Units\Job;

class UpdateBookJob extends Job
{
    private object $book;

    private array $payload;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($book, $payload)
    {
        $this->book = $book;
        $this->payload = $payload;
    }

    /**
     * Execute the job.
     *
     * @return object
     */
    public function handle()
    {
        $this->book->update($this->payload);

        return $this->book;
    }
}
