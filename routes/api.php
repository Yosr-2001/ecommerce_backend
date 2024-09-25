<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ScategorieController;
use App\Models\Scategorie;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('api')->group(function () {
    Route::resource('categories', CategorieController::class);
});

Route::middleware('api')->group(function () {
    Route::resource('scategories', ScategorieController::class);
});
    /*Route::get("/categories",[CategorieController::class,"index"]);
    Route::post("/categories",[CategorieController::class,"store"]);
    Route::get("/categories/{id}",[CategorieController::class,"show"]);
    
    */