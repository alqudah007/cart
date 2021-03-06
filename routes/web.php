<?php

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

Auth::routes();

Route::get('/', 'Product\ProductController@index')->name('product.index');
Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Web Routes for cart
|--------------------------------------------------------------------------
|
|
*/
Route::get('/cart', 'Cart\CartController@index')->name('cart.index');
Route::get('/cart/add/{product}', 'Cart\CartController@addToCart')->name('cart.add');
Route::get('/dump-session-cart', 'Cart\CartController@dumpsessioncart')->name('cart.dump');
Route::get('/clear-session-data', 'Cart\CartController@sessionFlushAyman')->name('cart.clear');
Route::get('/cart-checkout', 'Cart\CartController@checkout')->name('cart.checkout');// get strip token
Route::post('/cart-pay', 'Cart\CartController@pay')->name('cart.pay');// send token to my laravel
Route::get('/pay-done', 'Cart\CartController@paydone')->name('cart.paydone');// cart.paydone

Route::get('/get-user-orders', 'Order\OrderController@index')->name('order.index');// get user orders

/*
|--------------------------------------------------------------------------
| Product
|--------------------------------------------------------------------------
|
|
*/
Route::get('/product-related', 'Product\ProductController@getRandomProducts');


/*
|--------------------------------------------------------------------------
| Paypal Integration
|--------------------------------------------------------------------------
|
|
*/

Route::get('/paypal', function () {
    return view('cart.paypal-checkout');
});
Route::get('/paypal-done-payment', function () {
    console.log('xxxxxxxxxxxxxxxxxxxxx');
    dd('cccc');
});

