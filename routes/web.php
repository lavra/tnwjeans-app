<?php

use App\Http\Controllers\Admin\{
    UserController,
};

use App\Http\Controllers\Web\{
    HomeController,
};


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::get('/users', [UserController::class, 'index'])->name('users.index');

/*
|--------------------------------------------------------------------------
| Site
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');