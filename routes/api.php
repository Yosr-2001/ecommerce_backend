<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ScategorieController;
use App\Http\Controllers\StripeController;
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
Route::middleware('api')->group(function () {
    Route::resource('article', ArticleController::class);
});
Route::get("/listarticles/{idscat}", [ArticleController::class, 'showArticlesBySCAT']);
Route::get("/articles/art/articlesPaginate}", [ArticleController::class, 'articlesPaginate']);

/*Route::get("/categories",[CategorieController::class,"index"]);
    Route::post("/categories",[CategorieController::class,"store"]);
    Route::get("/categories/{id}",[CategorieController::class,"show"]);
    
    */
Route::post('/payment/processpayment', [StripeController::class,  'processPayment']);
