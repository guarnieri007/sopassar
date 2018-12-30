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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'PagesController@index')->name('home');

Auth::routes();

Route::get('/add-to-cart/{id}', 'CheckoutController@cartAdd')->name('cart.add')->middleware('auth');
Route::get('/shopping-cart', 'CheckoutController@cartGet')->name('shoppingCart')->middleware('auth');
Route::get('/checkout', 'CheckoutController@getCheckout')->name('checkout')->middleware('auth');
Route::get('/user/address', 'UserController@getAddress')->name('getAddress')->middleware('auth');
Route::post('/user/address', 'UserController@address')->name('postAddress')->middleware('auth');
Route::post('/user/edit-address', 'UserController@getToUpdateAddress')->name('edit-address')->middleware('auth');
Route::put('/user/edit-address', 'UserController@updateAddress')->name('edit-address')->middleware('auth');

/* Route::get('/home', 'HomeController@index')->name('home'); */
