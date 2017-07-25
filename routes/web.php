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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', 'ProductController');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('admin/products', ['as'=> 'admin.products.index', 'uses' => 'Admin\ProductController@index']);
Route::post('admin/products', ['as'=> 'admin.products.store', 'uses' => 'Admin\ProductController@store']);
Route::get('admin/products/create', ['as'=> 'admin.products.create', 'uses' => 'Admin\ProductController@create']);
Route::put('admin/products/{products}', ['as'=> 'admin.products.update', 'uses' => 'Admin\ProductController@update']);
Route::patch('admin/products/{products}', ['as'=> 'admin.products.update', 'uses' => 'Admin\ProductController@update']);
Route::delete('admin/products/{products}', ['as'=> 'admin.products.destroy', 'uses' => 'Admin\ProductController@destroy']);
Route::get('admin/products/{products}', ['as'=> 'admin.products.show', 'uses' => 'Admin\ProductController@show']);
Route::get('admin/products/{products}/edit', ['as'=> 'admin.products.edit', 'uses' => 'Admin\ProductController@edit']);

Route::get('tes', function(){
	
	$admin->attachPermission($createProduct);
});