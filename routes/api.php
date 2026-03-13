<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/products/{per_page}', [\App\Http\Controllers\ProductController::class, 'index']);
Route::get('/categories/{per_page}', [\App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/orders/{per_page}', [\App\Http\Controllers\OrderController::class, 'index']);
Route::get('/products/{slug}', [\App\Http\Controllers\ProductController::class, 'get']);
Route::get('/categories/{slug}', [\App\Http\Controllers\CategoryController::class, 'get']);
Route::get('/orders/{id}', [\App\Http\Controllers\OrderController::class, 'get']);
Route::get('/products/category/{category_slug}', [\App\Http\Controllers\ProductController::class, 'getByCategory']);
Route::post('/products', [\App\Http\Controllers\ProductController::class, 'create']);
Route::post('/categories', [\App\Http\Controllers\CategoryController::class, 'create']);
Route::post('/orders', [\App\Http\Controllers\OrderController::class, 'create']);
