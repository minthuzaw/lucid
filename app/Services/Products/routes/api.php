<?php

// Prefix: /api/products
use App\Services\Products\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/products', ProductController::class);
