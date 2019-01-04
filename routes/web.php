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
/* Route::get('/home', 'HomeController@index')->name('home'); */
Route::get('/', 'PagesController@index')->name('home');

Auth::routes();

/* Configured middleware for all the rotes bellow */
Route::middleware(['auth'])->group(function () {

    Route::get('/add-to-cart/{id}', 'CheckoutController@cartAdd')->name('cart.add');
    Route::get('/shopping-cart', 'CheckoutController@cartGet')->name('shoppingCart');
    Route::get('/checkout', 'CheckoutController@getCheckout')->name('checkout');
    Route::get('/user/address', 'UserController@getAddress')->name('getAddress');
    Route::post('/user/address', 'UserController@address')->name('postAddress');
    Route::post('/user/edit-address', 'UserController@getToUpdateAddress')->name('edit-address');
    Route::put('/user/edit-address', 'UserController@updateAddress')->name('edit-address');
    Route::delete('/user/delete-address', 'UserController@deleteAddress')->name('delete-address');
    Route::get('/user/profile', 'UserController@myProfile')->name('profile');
    Route::get('/user/edit-card', 'UserController@getCard')->name('card');
    Route::post('/user/edit-card', 'UserController@postCard')->name('card');
    Route::post('/user/update-card', 'UserController@updateCard')->name('updatecard');
    Route::delete('/user/edit-card', 'UserController@deleteCard')->name('card');
    Route::put('/user/edit-card', 'UserController@putCard')->name('card');
});
