<?php

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SslCommerzController;
use Illuminate\Support\Facades\Route;

// ---------------------------------------------------------------
// Storefront
// ---------------------------------------------------------------
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

// ---------------------------------------------------------------
// Cart (session-based)
// ---------------------------------------------------------------
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/add/{product}', [CartController::class, 'add'])->name('add');
    Route::patch('/update/{productId}', [CartController::class, 'update'])->name('update');
    Route::delete('/remove/{productId}', [CartController::class, 'remove'])->name('remove');
});

// ---------------------------------------------------------------
// Checkout
// ---------------------------------------------------------------
Route::prefix('checkout')->name('checkout.')->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('index');
    Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('place');
    Route::get('/success/{orderNumber}', [CheckoutController::class, 'success'])->name('success');
});

// ---------------------------------------------------------------
// SSLCommerz Sandbox Payment Callbacks
// NOTE: SSLCommerz calls success/fail/cancel/ipn via POST, and CSRF must be
// excluded for these routes (see bootstrap/app.php `validateCsrfTokens`).
// ---------------------------------------------------------------
Route::match(['get', 'post'], '/payment/success', [SslCommerzController::class, 'success'])->name('payment.success');
Route::match(['get', 'post'], '/payment/fail', [SslCommerzController::class, 'fail'])->name('payment.fail');
Route::match(['get', 'post'], '/payment/cancel', [SslCommerzController::class, 'cancel'])->name('payment.cancel');
Route::post('/payment/ipn', [SslCommerzController::class, 'ipn'])->name('payment.ipn');
Route::get('/payment/failed/{orderNumber}', [SslCommerzController::class, 'failPage'])->name('payment.fail.page');

// ---------------------------------------------------------------
// Basic Admin (no auth scaffolding included — add Breeze/Fortify or your
// own middleware before deploying this to production)
// ---------------------------------------------------------------
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', AdminProductController::class)->except(['show']);
});
