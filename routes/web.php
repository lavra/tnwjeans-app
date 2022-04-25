<?php

use App\Http\Controllers\Web\{
    HomeController,
    ProductController,
    WhatsappController,
    SocialController,
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

/*
|--------------------------------------------------------------------------
| Redirect Product
|--------------------------------------------------------------------------
*/
Route::get('comprar/produto/{id}', [ProductController::class, 'redirect'])->name('product-detail');
Route::post('ajax/product/{id}', [ProductController::class, 'store'])->name('product-store');
/*
|--------------------------------------------------------------------------
| Redes Sociais
|--------------------------------------------------------------------------
*/
Route::post('ajax/social/follow', [SocialController::class, 'follow']);
Route::post('ajax/social/share', [SocialController::class, 'share']);
Route::get('social/share/{network}/{id}', [SocialController::class, 'detail'])->name('social-detail');
/*
|--------------------------------------------------------------------------
| Share Whatsapp
|--------------------------------------------------------------------------
*/
Route::post('ajax/comment/whatsapp', [WhatsappController::class, 'comment'])->name('comment.whatsapp');


require __DIR__.'/auth.php';
