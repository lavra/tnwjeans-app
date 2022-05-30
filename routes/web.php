<?php

use App\Http\Controllers\Admin\{

    AdminController,
    ConfigWebsiteController,
    AdminSliderHomeController,
    AdminLookbookHomeController,

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

    Route::post('config/website-color', [ConfigWebsiteController::class, 'color']);
    Route::post('config/dark-switch', [ConfigWebsiteController::class, 'dark_switch']);
    Route::post('config/boxed_switch', [ConfigWebsiteController::class, 'boxed_switch']);
    Route::post('config/separator_switch', [ConfigWebsiteController::class, 'separator_switch']);

    Route::get('/painel', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/painel/slider-1', [AdminSliderHomeController::class, 'index'])->name('slider1.index');
    Route::get('/painel/slider-1/create', [AdminSliderHomeController::class, 'create'])->name('slider1.create');
    Route::post('/painel/slider-1/store', [AdminSliderHomeController::class, 'store'])->name('slider1.store');
    Route::get('/painel/slider-1/{id}/edit', [AdminSliderHomeController::class, 'edit'])->name('slider1.edit');    
    Route::put('/painel/slider-1/update/{id}', [AdminSliderHomeController::class, 'update'])->name('slider1.update');    
    Route::get('/painel/slider-1/destroy/{id}', [AdminSliderHomeController::class, 'destroy'])->name('slider1.destroy');  

    Route::get('/painel/lookbook', [AdminLookbookHomeController::class, 'index'])->name('lookbook.index');
    Route::get('/painel/lookbook/create', [AdminLookbookHomeController::class, 'create'])->name('lookbook.create');
    Route::post('/painel/lookbook/store', [AdminLookbookHomeController::class, 'store'])->name('lookbook.store');
    Route::get('/painel/lookbook/{id}/edit', [AdminLookbookHomeController::class, 'edit'])->name('lookbook.edit');    
    Route::put('/painel/lookbook/update/{id}', [AdminLookbookHomeController::class, 'update'])->name('lookbook.update');    
    Route::get('/painel/lookbook/destroy/{id}', [AdminLookbookHomeController::class, 'destroy'])->name('lookbook.destroy');

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
