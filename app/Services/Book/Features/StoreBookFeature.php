<?php

namespace App\Services\Book\Features;

use App\Domains\Book\Jobs\StoreBookJob;
use App\Domains\Book\Requests\StoreBookRequest;
use App\Helpers\JsonResponder;
use Lucid\Units\Feature;

class StoreBookFeature extends Feature
{
    public function handle(StoreBookRequest $request)
    {
        $book = $this->run(StoreBookJob::class, ['book' => $request->validated()]);

        return JsonResponder::success('success', $book);
    }
}
