<?php

namespace App\Domains\Author\Jobs;

use Lucid\Units\Job;

class UpdateAuthorJob extends Job
{
    private object $author;

    private array $payload;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($author, $payload)
    {
        $this->author = $author;
        $this->payload = $payload;
    }

    /**
     * Execute the job.
     *
     * @return object
     */
    public function handle()
    {
        $this->author->update($this->payload);

        return $this->author;
    }
}
