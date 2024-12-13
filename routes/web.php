<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/produk/{id}', [App\Http\Controllers\ProdukController::class, 'show'])->name('produk');
Route::get('/cart', [App\Http\Controllers\ProdukController::class, 'cart'])->name('cart');
Route::post('/cart', [App\Http\Controllers\ProdukController::class, 'cart']);
Route::get('/addtocart/{produk_id}', [App\Http\Controllers\ProdukController::class, 'addtocart']);
Route::get('/deletecart/{cart_id}', [App\Http\Controllers\ProdukController::class, 'deletecart']);
Route::get('/checkout', [App\Http\Controllers\ProdukController::class, 'checkout'])->name('checkout');
Route::get('/payment/{id}', [App\Http\Controllers\ProdukController::class, 'showPayment']);
Route::get('/history', [App\Http\Controllers\ProdukController::class, 'history'])->name('history');
Route::get('/cancel-payment/{id}', [App\Http\Controllers\ProdukController::class, 'cancelPayment']);

