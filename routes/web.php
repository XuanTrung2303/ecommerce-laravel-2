<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/')->group(function () {
    Route::get('', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
    Route::get('shop/{slug?}', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
    Route::get('shop/tag/{slug?}', [\App\Http\Controllers\ShopController::class, 'tag'])->name('shop.tag');
    Route::get('product/{product:slug}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
    Route::get('blog', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog');

    Route::resource('cart', App\Http\Controllers\CartController::class)->only('index');

    Route::get('order/checkout', [App\Http\Controllers\OrderController::class, 'process'])->name('checkout.process');

    //Route React
    Route::get('products', [\App\Http\Controllers\HomeController::class, 'get_products']);
    Route::post('carts', [App\Http\Controllers\CartController::class, 'store']);
    Route::get('carts', [App\Http\Controllers\CartController::class, 'get_carts']);
    Route::put('carts/{cart_id}', [App\Http\Controllers\CartController::class, 'update_carts']);
    Route::delete('carts/{cart_id}', [App\Http\Controllers\CartController::class, 'delete_carts']);
});

Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::prefix('/')->group(function () {

        // Dashboard
        Route::get('', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

        //categories
        Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
        Route::post('categories/image', [\App\Http\Controllers\Admin\CategoryController::class, 'storeImage'])->name('categories.storeImage');

        //tags
        Route::resource('tags', \App\Http\Controllers\Admin\TagController::class);

        //products
        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
        Route::post('products/image', [\App\Http\Controllers\Admin\ProductController::class, 'storeImage'])->name('products.storeImage');
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');