<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

//route for the welcome page
Route::get('/', [PublicController::class, 'home'])->name('home');

//route for the index of all the articles
Route::get('/articles/index', [ArticleController::class, 'index'])->name('show.articles');