<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ArticleController; 
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\Auth\AuthController;


//  ROTTE PUBBLICHE
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/index', [PublicController::class, 'index'])->name('index');
Route::resource('posts', PostController::class);

// ROTTE PER PRODOTTI 
Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create')->middleware('auth');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store')->middleware('auth');
Route::get('/product/show/{product}', [ProductController::class, 'show'])->name('product.show');

//  ROTTE CRUD PER ORODOTTI
Route::get('/product/edit/{product}', [ProductController::class, 'edit'])->name('product.edit')->middleware('auth');
Route::put('/product/update/{product}', [ProductController::class, 'update'])->name('product.update')->middleware('auth');
Route::delete('/product/destroy/{product}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware('auth');

// ROTTE PER ARTICOLI
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');
Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store')->middleware('auth');
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');

// ROTTE CRUD PER GLI ARTICOLI 
Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('articles.edit')->middleware('auth');
Route::put('/article/update/{article}', [ArticleController::class, 'update'])->name('articles.update')->middleware('auth');
Route::delete('/article/destroy/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy')->middleware('auth');

// --- ROTTE DI REGISTRAZIONE
Route::view('/register', 'auth.register')->name('register'); 
Route::post('/register', [AuthController::class, 'register'])->name('register.store'); 

// ---  ROTTE LOGIN & LOGOUT 
Route::view('/login', 'auth.login')->name('login'); 
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
