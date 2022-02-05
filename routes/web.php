<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('', [HomeController::class, 'index']);
Route::get('blogs/{blog}', [HomeController::class, 'show'])->name('blog.show');
