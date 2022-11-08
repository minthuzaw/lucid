<?php

namespace App\Services\Author\Features;

use App\Domains\Author\Jobs\UpdateAuthorJob;
use App\Domains\Author\Requests\UpdateAuthorRequest;
use App\Helpers\JsonResponder;
use Lucid\Units\Feature;

class UpdateAuthorFeature extends Feature
{
    private object $author;

    public function __construct($author)
    {
        $this->author = $author;
    }

    public function handle(UpdateAuthorRequest $request)
    {
        $author = $this->run(UpdateAuthorJob::class,
            [
                'author' => $this->author,
                'payload' => $request->validated(),
            ]);

        return JsonResponder::success('success', $author);
    }
}
