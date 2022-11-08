<?php

namespace App\Services\Book\Features;

use App\Domains\Book\Jobs\IndexBookJob;
use App\Helpers\JsonResponder;
use Lucid\Units\Feature;

class IndexBookFeature extends Feature
{
    public function handle()
    {
        $book = $this->run(IndexBookJob::class);

        return JsonResponder::success('success', $book);
    }
}
