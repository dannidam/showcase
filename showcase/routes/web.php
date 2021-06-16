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

use App\Events\OrderStatusUpdate;

/*Front*/
Route::get('shopping', 'Shopping\Front@main');
/*Products*/
Route::get('shopping/products', 'Shopping\Products@main');
Route::get('shopping/addProduct', 'Shopping\Products@addNew');
/*Edit Products*/
Route::get('shopping/editProduct={id}', 'Shopping\editProduct_C@main');
Route::post('shopping/updateProduct', 'Shopping\editProduct_C@updateProd');
Route::post('shopping/add_product', 'Shopping\Products@saveProduct');
Route::post('shopping/add_to_temp', 'Shopping\Products@addTemp');
Route::post('shopping/deduct_to_temp', 'Shopping\Products@deductTemp');
/*List*/
Route::get('shopping/daily_list={group}', 'Shopping\dailyList@main');
Route::post('shopping/add_to_list={group}', 'Shopping\List@saveProduct');
/*Login*/
Route::get('shopping/login', 'Shopping\Login@main');
Route::post('shopping/handleLogin', 'Shopping\Login@manageLogin');
/*Options*/
Route::post('shopping/logout', 'Shopping\options@logout');

