<?php

use App\Http\Controllers\ContactRequestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/contacts', [ContactRequestController::class, 'sendContacts'])
->name('contact.send');
