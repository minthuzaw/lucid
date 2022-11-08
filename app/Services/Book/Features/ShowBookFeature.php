<?php

namespace App\Services\Book\Features;

use App\Domains\Book\Jobs\ShowBookJob;
use App\Helpers\JsonResponder;
use Lucid\Units\Feature;

class ShowBookFeature extends Feature
{
    private object $book;

    public function __construct($book)
    {
        $this->book = $book;
    }

    public function handle()
    {
        $book = $this->run(ShowBookJob::class, ['book' => $this->book]);

        return JsonResponder::success('success', $book);
    }
}
