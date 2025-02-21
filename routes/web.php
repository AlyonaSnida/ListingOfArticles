<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts/{slug_category}', [CategoryController::class, 'show'])
->name('category.show');

Route::get('/posts/{slug_category}/{slug_article}', [ArticleController::class, 'show'])
->name('article.show');

Route::get('/contacts', [ContactRequestController::class, 'getContactsPage'])
->name('contacts.show');

Route::get('/', [HomeController::class, 'getHomePage'])
->name('home');
