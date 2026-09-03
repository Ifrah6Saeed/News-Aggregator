<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FavoriteController;
use App\Models\Article;  // <<--- IMPORT ARTICLE MODEL

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/* Dashboard */
Route::get('/dashboard', function () {
    // Latest 5 articles with category
    $latestArticles = Article::with('category')->latest()->paginate(5);

    return view('dashboard', compact('latestArticles'));
})->middleware(['auth', 'verified'])->name('dashboard');

/* Profile routes (Breeze default) */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/* =========================
   News Aggregator Routes
   ========================= */

/* Category CRUD (login required) */
Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
});

/* Article CRUD */
Route::resource('articles', ArticleController::class);

/* Favorite (add to favorites) */
Route::post('/favorite/{article}', [FavoriteController::class, 'store'])
    ->middleware('auth')
    ->name('favorite.store');

/* Favorites list page */
Route::get('/favorites', [FavoriteController::class, 'index'])
    ->middleware('auth')
    ->name('favorites.index');

/* Auth routes */
require __DIR__.'/auth.php';
