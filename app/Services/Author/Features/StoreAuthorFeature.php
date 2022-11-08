<?php

namespace App\Services\Author\Features;

use App\Domains\Author\Jobs\StoreAuthorJob;
use App\Domains\Author\Requests\StoreAuthorRequest;
use App\Helpers\JsonResponder;
use Lucid\Units\Feature;

class StoreAuthorFeature extends Feature
{
    public function handle(StoreAuthorRequest $request)
    {
        $author = $this->run(StoreAuthorJob::class, ['author' => $request->validated()]);

        return JsonResponder::success('success', $author);
    }
}
