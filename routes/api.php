<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostApiController;

Route::get('/posts',[PostApiController::class,'index']);
Route::get('/post/{slug}',[PostApiController::class,'detail']);
