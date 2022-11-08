<?php

namespace App\Services\Author\Http\Controllers;

use App\Data\Models\Author;
use App\Services\Author\Features\DestroyAuthorFeature;
use App\Services\Author\Features\IndexAuthorFeature;
use App\Services\Author\Features\ShowAuthorFeature;
use App\Services\Author\Features\StoreAuthorFeature;
use App\Services\Author\Features\UpdateAuthorFeature;
use Lucid\Units\Controller;

class AuthorController extends Controller
{
    /**
     * Index
     *
     * @unauthenticated
     * @group Author
     */
    public function index()
    {
        return $this->serve(IndexAuthorFeature::class);
    }

    /**
     * Store
     *
     * @group Author
     * @unauthenticated
     *
     * @bodyParam name string required The name of the author. Example: author name
     */
    public function store()
    {
        return $this->serve(StoreAuthorFeature::class);
    }

    /**
     * Update
     *
     * @group Author
     * @unauthenticated
     *
     * @bodyParam name string required The name of the author. Example: author name
     */
    public function update(Author $author)
    {
        return $this->serve(UpdateAuthorFeature::class, ['author' => $author]);
    }

    /**
     * Show
     *
     * @group Author
     * @unauthenticated
     */
    public function show(Author $author)
    {
        return $this->serve(ShowAuthorFeature::class, ['author' => $author]);
    }

    /**
     * Delete
     *
     * @group Author
     * @unauthenticated
     */
    public function destroy(Author $author)
    {
        return $this->serve(DestroyAuthorFeature::class, ['author' => $author]);
    }
}
