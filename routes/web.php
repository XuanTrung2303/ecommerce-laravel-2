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
    Route::get('shop', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
    Route::get('product/{slug}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

    Route::resource('cart', App\Http\Controllers\CartController::class);

    Route::get('order/checkout', [App\Http\Controllers\OrderController::class, 'process'])->name('checkout.process');
});

Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin'], function () {
    Route::prefix('/')->group(function () {
        Route::get('', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
