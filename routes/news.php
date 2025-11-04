<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::resource('news', NewsController::class)->middleware('auth');;
