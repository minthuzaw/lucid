<?php

// Prefix: /api/author

use App\Services\Author\Http\Controllers\AuthorController;

Route::apiResource('authors', AuthorController::class);
