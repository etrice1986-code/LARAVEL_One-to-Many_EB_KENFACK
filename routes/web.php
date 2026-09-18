<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PostController;

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/index',[PublicController::class, 'index'])->name('index');

Route::resource('posts', PostController::class);
