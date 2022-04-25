<?php

use App\Http\Controllers\Web\{
    HomeController,
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Painel Administrativo
|--------------------------------------------------------------------------
*/


Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Site
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home') ;


require __DIR__.'/auth.php';
