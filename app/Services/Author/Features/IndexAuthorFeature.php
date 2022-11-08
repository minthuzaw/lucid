<?php

namespace App\Services\Author\Features;

use App\Domains\Author\Jobs\IndexAuthorJob;
use App\Helpers\JsonResponder;
use Lucid\Units\Feature;

class IndexAuthorFeature extends Feature
{
    public function handle()
    {
        $author = $this->run(IndexAuthorJob::class);

        return JsonResponder::success('success', $author);
    }
}
