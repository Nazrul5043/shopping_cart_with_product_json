<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
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


//guest user

Route::get('/', [ProductController::class, 'productList'])->name('products.list');
Route::get('home', [ProductController::class, 'productList'])->name('home');
Route::get('/product/{product_id}', [ProductController::class, 'product'])->name('product');
Route::get('cart/list', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

//auth registration and verify
Route::namespace('Auth')->group(function () {
    Route::get('/login',[LoginController::class,'login_form'])->name('login');
    Route::post('/auth',[LoginController::class,'authenticate'])->name('auth');
    Route::get('/register',[LoginController::class,'signup_form'])->name('register');
    Route::post('/register',[LoginController::class,'signup']);
    Route::post('/logout',[LoginController::class,'logout'])->name('logout');
  });

//loggedin user
  Route::group(['middleware' => 'auth'], function() {
    Route::post('cart.checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('get_orders', [OrderController::class, 'index'])->name('get_orders');
    Route::get('get_order/{order_id}', [OrderController::class, 'show'])->name('get_order');
  });

