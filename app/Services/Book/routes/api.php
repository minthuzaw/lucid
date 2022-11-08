<?php

// Prefix: /api/book

use App\Services\Book\Http\Controllers\BookController;

Route::apiResource('books', BookController::class);
//Route::group(['prefix' => 'book'], function() {
//
//    // Controllers live in src/Services/Book/Http/Controllers
//
//    Route::get('/', function() {
//        return response()->json(['path' => '/api/book']);
//    });
//
//    Route::middleware('auth:api')->get('/user', function (Request $request) {
//        return $request->user();
//    });
//
//});
