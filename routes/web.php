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

Route::namespace('Auth')->group(function () {
    Route::get('/login','LoginController@show_login_form')->name('login');
    Route::post('/login','LoginController@process_login')->name('login');
    Route::get('/register','LoginController@show_signup_form')->name('register');
    Route::post('/register','LoginController@process_signup')->name('register');
    Route::post('/logout','LoginController@logout')->name('logout');
});

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', 'HomeController@index')->name('home');
Route::get('/shop', 'HomeController@index')->name('shop');

// checkout
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');

