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
    return redirect()->route('login');

});

Route::resource('products', 'ProductController');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('products', ['as'=> 'products.index', 'uses' => 'ProductController@index']);
Route::post('products', ['as'=> 'products.store', 'uses' => 'ProductController@store']);
Route::get('products/create', ['as'=> 'products.create', 'uses' => 'ProductController@create']);
Route::put('products/{products}', ['as'=> 'products.update', 'uses' => 'ProductController@update']);
Route::patch('products/{products}', ['as'=> 'products.update', 'uses' => 'ProductController@update']);
Route::delete('products/{products}', ['as'=> 'products.destroy', 'uses' => 'ProductController@destroy']);
Route::get('products/{products}', ['as'=> 'products.show', 'uses' => 'ProductController@show']);
Route::get('products/{products}/edit', ['as'=> 'products.edit', 'uses' => 'ProductController@edit']);

Route::prefix('manage')->group(function(){
	Route::get('/', 'ManageController@index');
	Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
});




Route::get('tes', function(){
	
	$admin->attachPermission($createProduct);
});