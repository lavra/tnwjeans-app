<?php

use App\Http\Controllers\Admin\{

    AdminController,
    AdminSliderHomeController,

};

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


Route::middleware(['auth'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/admin/slider-1', [AdminSliderHomeController::class, 'index'])->name('admin.slider1');
    Route::get('/admin/slider-1/create', [AdminSliderHomeController::class, 'create'])->name('admin.slider1.create');
    Route::post('/admin/slider-1/store', [AdminSliderHomeController::class, 'store'])->name('admin.slider1.store');

});
 


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
