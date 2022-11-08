<?php

namespace App\Domains\Author\Jobs;

use App\Data\Models\Author;
use Lucid\Units\Job;

class StoreAuthorJob extends Job
{
    private array $author;

    /**
     * Create a new job instance.
     *
     * @return void
     */
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
        return Author::create($this->author);
    }
}
