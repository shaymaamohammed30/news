<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController;
Route::resource('news', NewsController::class)->middleware('auth');
Route::resource('comments', CommentController::class);
