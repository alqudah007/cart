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
Route::get('/dump-session-cart', 'Cart\CartController@dumpsessioncart');
