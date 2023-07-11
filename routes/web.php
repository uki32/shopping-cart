<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [
//     'uses' => 'ProductController@getIndex',
//     'as' => 'product.index'
// ]);

Route::get("/product", [ProductController::class, 'index'])->name('product.index');

Route::get('/add-to-cart/{id}', [ProductController::class, 'getAddToCart'])->name('product.addToCart');

Route::get('/reduce/{id}', [ProductController::class, 'getReduceByOne'])->name('product.reduceByOne');

Route::get('/remove/{id}', [ProductController::class, 'getRemoveItem'])->name('product.remove');

Route::get('/shopping-cart', [ProductController::class, 'getCart'])->name('product.shoppingCart');

Route::get('/checkout', [ProductController::class, 'getCheckout'])->name('checkout')->middleware('auth');

Route::post('/checkout', [ProductController::class, 'checkout'])->name('checkout')->middleware('auth');

Route::middleware(['guest'])->group(function () {
    Route::get('/signupView', [UserController::class, 'signupForm'])->name('signup.view');

    Route::post('/signup', [UserController::class, 'signup'])->name('user.signup');
    
    Route::get('/signinView', [UserController::class, 'signinForm'])->name('signin.form');
    
    Route::post('/signin', [UserController::class, 'signin']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user/profile', [UserController::class, 'profileView']);

    Route::get('/user/logout', [UserController::class, 'getLogout']);
});
