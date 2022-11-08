<?php

namespace App\Services\Author\Features;

use App\Domains\Author\Jobs\DestroyAuthorJob;
use App\Helpers\JsonResponder;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class DestroyAuthorFeature extends Feature
{
    private object $author;

    public function __construct($author)
    {
        $this->author = $author;
    }

    public function handle(Request $request)
    {
        $author = $this->run(DestroyAuthorJob::class, ['author' => $this->author]);

        return JsonResponder::success('success', $author);
    }
}
