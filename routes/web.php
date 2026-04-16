<?php

use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\NewsLetterController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\CheckoutController;
// use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\InvestBannerController;
use App\Http\Controllers\InvestSettingController;
use App\Http\Controllers\InvestFactController;
use App\Http\Controllers\InvesttractionController;
use App\Http\Controllers\InvestFaqsController;
use App\Http\Controllers\InvestplanController;
use App\Http\Controllers\Frontend\InvestHomeController;



use Illuminate\Support\Facades\Route;


Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest');


// editable routes for APP
Route::group(['as' => 'frontend.'], function () {
    
    Route::get('/', [InvestHomeController::class, 'index'])->name('home');



    // Route::post('/sub-news-letter', [HomeController::class, 'storeNewsLetter'])->name('storenewsletter');
    // Route::post('/contact-store', [HomeController::class, 'storeContact'])->name('storeContact');
    
    // Route::get('/category/product', [HomeController::class, 'getProductByCategory'])->name('category-product');


    // Route::get("/checkout/{id}",[CheckoutController::class,'index'])->name('checkout');
    // Route::get("/store/{id}",[CheckoutController::class,'store'])->name('checkout.store');

    
    
});

Route::group(['as' => 'admin.', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard',[DashboardController::class,'index'] )->name('dashboard');


    Route::group(['as' => 'category.', 'prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/update', [CategoryController::class, 'update'])->name('update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy');

        // ajax route
        Route::post('/update/order', [CategoryController::class, 'updateOrder'])->name('update-order');
    });

    Route::group(['as' => 'brand.', 'prefix' => 'brand'], function () {
        Route::get('/', [BrandController::class, 'index'])->name('index');
        Route::post('/', [BrandController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BrandController::class, 'edit'])->name('edit');
        Route::put('/update', [BrandController::class, 'update'])->name('update');
        Route::delete('/{id}', [BrandController::class, 'destroy'])->name('destroy');

        // ajax route
        Route::post('/update/order', [BrandController::class, 'updateOrder'])->name('update-order');
    });

    Route::group(['as' => 'slider.', 'prefix' => 'slider'], function () {
        Route::get('/', [SliderController::class, 'index'])->name('index');
        Route::post('/', [SliderController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SliderController::class, 'edit'])->name('edit');
        Route::put('/update', [SliderController::class, 'update'])->name('update');
        Route::delete('/{id}', [SliderController::class, 'destroy'])->name('destroy');

        // ajax route
        Route::post('/update/order', [SliderController::class, 'updateOrder'])->name('update-order');
    });

    Route::group(['as' => 'banner.', 'prefix' => 'banner'], function () {
        Route::get('/', [BannerController::class, 'index'])->name('index');
        Route::post('/', [BannerController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('edit');
        Route::put('/update', [BannerController::class, 'update'])->name('update');
        Route::delete('/{id}', [BannerController::class, 'destroy'])->name('destroy');

        // ajax route
        Route::post('/update/order', [SliderController::class, 'updateOrder'])->name('update-order');
    });

    Route::group(['as' => 'product.', 'prefix' => 'product'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('update');
        
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
    });

    Route::group(['as' => 'news-letter.', 'prefix' => 'news-letter'], function () {
        Route::get('/', [NewsLetterController::class, 'index'])->name('index');
        Route::delete('/{id}', [NewsLetterController::class, 'destroy'])->name('destroy');
    });

    Route::group(['as' => 'contact.', 'prefix' => 'contact'], function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::delete('/{id}', [ContactController::class, 'destroy'])->name('destroy');
    });

    Route::group(['as' => 'setting.', 'prefix' => 'general-setting'], function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::put('/update', [SettingController::class, 'update'])->name('update');
    });


    // affiliate crud operation 
    Route::resource('affiliate', AffiliateController::class);
    // order submit croutes
    // Route::resource('order', OrderController::class);
    Route::get('order', [OrderController::class, 'index'])->name('order.index');
    Route::get('order/create', [OrderController::class, 'create'])->name('order.create');

    Route::post('order', [OrderController::class, 'store'])->name('order.store');
    Route::post('order-update', [OrderController::class, 'statusUpdate'])->name('order.status');

    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');

    Route::get('source', [SourceController::class, 'index'])->name('source.index');
    Route::put('source', [SourceController::class, 'update'])->name('source.update');


    // Project Investment Routes
    // Settings
    Route::get('invest-setting', [InvestSettingController::class, 'index'])->name('invest-setting.index');
    Route::put('invest-setting/update', [InvestSettingController::class, 'update'])->name('invest-setting.update');

    // compleate
    Route::get('invest-banner', [InvestBannerController::class, 'index'])->name('invest-banner.index');
    Route::post('invest-banner/store', [InvestBannerController::class, 'store'])->name('invest-banner.store');
    Route::get('invest-banner/edit/{id}', [InvestBannerController::class, 'edit'])->name('invest-banner.edit');
    Route::put('invest-banner/update', [InvestBannerController::class, 'update'])->name('invest-banner.update');
    Route::delete('invest-banner/delete/{id}', [InvestBannerController::class, 'destroy'])->name('invest-banner.destroy');

    // compleate
    Route::get('invest-faq', [InvestFaqsController::class, 'index'])->name('invest-faq.index');
    Route::post('invest-faq/store', [InvestFaqsController::class, 'store'])->name('invest-faq.store');
    Route::get('invest-faq/edit/{id}', [InvestFaqsController::class, 'edit'])->name('invest-faq.edit');
    Route::put('invest-faq/update', [InvestFaqsController::class, 'update'])->name('invest-faq.update');
    Route::delete('invest-faq/delete/{id}', [InvestFaqsController::class, 'destroy'])->name('invest-faq.destroy');

    // compleate    
    Route::get('invest-fact', [InvestFactController::class, 'index'])->name('invest-fact.index');
    Route::post('invest-fact/store', [InvestFactController::class, 'store'])->name('invest-fact.store');
    Route::get('invest-fact/edit/{id}', [InvestFactController::class, 'edit'])->name('invest-fact.edit');
    Route::put('invest-fact/update', [InvestFactController::class, 'update'])->name('invest-fact.update');
    Route::delete('invest-fact/delete/{id}', [InvestFactController::class, 'destroy'])->name('invest-fact.destroy');

    // Compleate
    Route::get('invest-traction', [InvesttractionController::class, 'index'])->name('invest-traction.index');
    Route::post('invest-traction/store', [InvesttractionController::class, 'store'])->name('invest-traction.store');
    Route::get('invest-traction/edit/{id}', [InvesttractionController::class, 'edit'])->name('invest-traction.edit');
    Route::put('invest-traction/update', [InvesttractionController::class, 'update'])->name('invest-traction.update');
    Route::delete('invest-traction/delete/{id}', [InvesttractionController::class, 'destroy'])->name('invest-traction.destroy');
    // compleate
    Route::get('invest-plan', [InvestplanController::class, 'index'])->name('invest-plan.index');
    Route::post('invest-plan/store', [InvestplanController::class, 'store'])->name('invest-plan.store');
    Route::get('invest-plan/edit/{id}', [InvestplanController::class, 'edit'])->name('invest-plan.edit');
    Route::put('invest-plan/update', [InvestplanController::class, 'update'])->name('invest-plan.update');
    Route::delete('invest-plan/delete/{id}', [InvestplanController::class, 'destroy'])->name('invest-plan.destroy');
});

require __DIR__ . '/auth.php';
