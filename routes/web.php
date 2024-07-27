<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/',[PageController::class,'index'])->name('page.index');
Route::get('/detail/{slug}',[PageController::class,'detail'])->name('page.detail');
Route::get('/showByCategory/{category:slug}',[PageController::class,'postByCategory'])->name('page.category');
Route::get('/showByUser/{id}',[PageController::class,'postByUser'])->name('page.user');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/category', CategoryController::class);
    Route::resource('/post', PostController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/nation', NationController::class);
    Route::resource('/photos',PhotoController::class);
});
