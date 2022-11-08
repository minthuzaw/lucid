<?php

namespace App\Services\Book\Http\Controllers;

use App\Data\Models\Book;
use App\Services\Book\Features\DestroyBookFeature;
use App\Services\Book\Features\IndexBookFeature;
use App\Services\Book\Features\ShowBookFeature;
use App\Services\Book\Features\StoreBookFeature;
use App\Services\Book\Features\UpdateBookFeature;
use Lucid\Units\Controller;

class BookController extends Controller
{
    /**
     * Index
     *
     * @group Book
     */
    public function index()
    {
        return $this->serve(IndexBookFeature::class);
    }

    /**
     * Store
     *
     * @group Book
     * @unauthenticated
     *
     * @bodyParam name string required The name of the product. Example: Book name
     * @bodyParam description string required The description of the product. Example: Book description
     * @bodyParam author string required The author of the product. Example: Book author name
     */
    public function store()
    {
        return $this->serve(StoreBookFeature::class);
    }

    /**
     * Update
     *
     * @group Book
     * @unauthenticated
     *
     * @bodyParam name string required The name of the product. Example: Book name
     * @bodyParam description string required The description of the product. Example: Book description
     * @bodyParam author string required The author of the product. Example: Book author name
     */
    public function update(Book $book)
    {
        return $this->serve(UpdateBookFeature::class, ['book' => $book]);
    }

    /**
     * Show
     *
     * @group Book
     * @unauthenticated
     */
    public function show(Book $book)
    {
        return $this->serve(ShowBookFeature::class, ['book' => $book]);
    }

    /**
     * Delete
     *
     * @group Book
     * @unauthenticated
     */
    public function destroy(Book $book)
    {
        return $this->serve(DestroyBookFeature::class, ['book' => $book]);
    }
}
