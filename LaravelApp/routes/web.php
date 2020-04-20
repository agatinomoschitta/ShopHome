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

    

Route::resource('products', 'ProductController')->middleware('auth');
Route::post('addCart', 'ProductController@addCart');
Route::get('cart', 'OrderController@showCart');
Route::resource('orders', 'OrderController')->middleware('auth');
Route::get('users/profilo', 'UserController@showProfile')->middleware('auth');
Route::get('users/create', 'UserController@create');
Route::post('users/save', 'UserController@save')->middleware('auth');;
Auth::routes();

Route::resource('/', 'MainController');