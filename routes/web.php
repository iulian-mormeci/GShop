<?php

use Filament\Panel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Providers\Filament\AdminPanelProvider;

//route for the welcome page
Route::get('/', [PublicController::class, 'home'])->name('home');

//route for the index of all the articles
Route::get('/articles/index', [ArticleController::class, 'index'])->name('index.articles');

//route for the detail of an article
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('show.article');
