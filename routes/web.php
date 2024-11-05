<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleControllerLegacy;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', [PageController::class, 'about']);

Route::resource('articles', ArticleController::class);
