<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['middleware' => ['auth']], function () {
    Route::get('categories', 'Api\CategoryController@index');
    Route::get('parents', 'Api\CategoryController@parents');
    Route::get('products', 'Api\ProductController@index');
    Route::get('manufacturers', 'Api\ManufacturerController@index');
    Route::get('prices', 'Api\PriceController@index');
    Route::get('/cart', 'Api\CartController@cart');
    Route::post('/add', 'Api\CartController@add');
    Route::post('/update', 'Api\CartController@update');
    Route::post('/remove', 'Api\CartController@remove');
    Route::post('/clear', 'Api\CartController@clear');
// });
