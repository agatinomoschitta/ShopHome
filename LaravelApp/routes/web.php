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
Route::post('deleteItemCart', 'OrderController@deleteItem')->middleware('auth');;
Route::get('cart', 'OrderController@showCart');
Route::get('order', 'OrderController@order')->middleware('auth');
Route::get('filter/{category}', 'MainController@filter');
Route::get('search/{title}', 'MainController@search');
Route::resource('orders', 'OrderController')->middleware('auth');
Route::get('users/profilo', 'UserController@showProfile')->middleware('auth');
Route::get('ordini', 'UserController@showOrdini')->middleware('auth');
Route::get('orderdetails/{id}', 'UserController@showDetails')->middleware('auth');
Route::get('detailorder/{id}', 'UserController@details')->middleware('auth');
Route::get('editproduct/{id}', 'ProductController@edit')->middleware('auth');
Route::get('deleteProduct/{id}', 'ProductController@delete')->middleware('auth');
Route::get('deleteOrder/{id}', 'OrderController@delete')->middleware('auth');
Route::get('newproduct', 'ProductController@newproduct')->middleware('auth');
Route::get('newcategory', 'ProductController@newcategory')->middleware('auth');
Route::get('prodotti', 'UserController@showProdotti')->middleware('auth');
Route::get('checkout', 'OrderController@checkout')->middleware('auth');
Route::get('users/create', 'UserController@create');
Route::post('users/save', 'UserController@save')->middleware('auth');
Route::post('ordersave', 'OrderController@save')->middleware('auth');
Route::post('productAdd', 'ProductController@add')->middleware('auth');
Route::post('categoryAdd', 'ProductController@categoryAdd')->middleware('auth');
Route::post('productSave', 'ProductController@saveProduct')->middleware('auth');
Auth::routes();

Route::resource('/', 'MainController');