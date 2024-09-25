<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/books', BookController::class);

Route::post('/review/store', [BookController::class, 'storeReview']);

Route::get('/review/get/{id}', [BookController::class, 'getReview']);
