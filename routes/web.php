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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/users', 'UsersController@getAllUsers')->name('user');

Route::get('/categories', 'CategoriesController@categories')->name('categories');

Route::get('/products', 'ProductsController@products')->name('products');

Route::get('/category/{id}', 'CategoriesController@category')->name('category');

Route::get('/product/{id}', 'ProductsController@product')->name('product');

Route::get('/cart', 'CartController@cart')->name('cart');

Route::get('/cartAdd/{id}', 'CartController@cartAdd')->name('cartAdd');

Route::get('/cartAddAjax/{id}', 'CartController@cartAddAjax')->name('cartAddAjax');
