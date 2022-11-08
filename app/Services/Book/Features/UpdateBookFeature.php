<?php

namespace App\Services\Book\Features;

use App\Domains\Book\Jobs\UpdateBookJob;
use App\Domains\Book\Requests\UpdateBookRequest;
use App\Helpers\JsonResponder;
use Lucid\Units\Feature;

class UpdateBookFeature extends Feature
{
    private object $book;

    public function __construct($book)
    {
        $this->book = $book;
    }

    public function handle(UpdateBookRequest $request)
    {
        $book = $this->run(UpdateBookJob::class, ['book' => $this->book, 'payload' => $request->validated()]);

        return JsonResponder::success('success', $book);
    }
}
