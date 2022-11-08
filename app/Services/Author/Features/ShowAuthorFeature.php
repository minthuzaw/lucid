<?php

namespace App\Services\Author\Features;

use App\Domains\Author\Jobs\ShowAuthorJob;
use App\Helpers\JsonResponder;
use Illuminate\Http\Request;
use Lucid\Units\Feature;

class ShowAuthorFeature extends Feature
{
    private object $author;

    public function __construct($author)
    {
        $this->author = $author;
    }

    public function handle(Request $request)
    {
        $author = $this->run(ShowAuthorJob::class, ['author' => $this->author]);

        return JsonResponder::success('success', $author);
    }
}
