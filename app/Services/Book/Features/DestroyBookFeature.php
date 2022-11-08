<?php

namespace App\Services\Book\Features;

use App\Domains\Book\Jobs\DestroyBookJob;
use App\Helpers\JsonResponder;
use Lucid\Units\Feature;

class DestroyBookFeature extends Feature
{
    private object $book;

    public function __construct($book)
    {
        $this->book = $book;
    }

    public function handle()
    {
        $book = $this->run(DestroyBookJob::class, ['book' => $this->book]);

        return JsonResponder::success('success', $book);
    }
}
