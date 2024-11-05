<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', [PageController::class, 'about']);

Route::get('articles', [ArticleController::class, 'index'])->name('article.index');
Route::get('articles/create', [ArticleController::class, 'create'])->name('article.create');
Route::get('articles/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::post('articles', [ArticleController::class, 'store'])->name('article.store');
Route::get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('article.edit');
Route::patch('articles/{article}', [ArticleController::class, 'update'])->name('article.update');
Route::delete('articles/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');
