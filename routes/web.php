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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['role:user||admin||super']], function() {
	Route::get('products/data', 'ProductController@data')->name('products.data');
	Route::get('products', 'ProductController@index')->name('products.index');
	Route::get('products/create', 'ProductController@create')->name('products.create');
	Route::post('products/store', 'ProductController@store')->name('products.store');

	Route::get('lineitems/create', 'LineitemController@create')->name('lineitems.create');
	Route::post('lineitems/store', 'LineitemController@store')->name('lineitems.store');
});



// Route::get('products', ['as'=> 'products.index', 'uses' => 'ProductController@index']);
// Route::post('products', ['as'=> 'products.store', 'uses' => 'ProductController@store']);
// Route::get('products/create', ['as'=> 'products.create', 'uses' => 'ProductController@create']);
// Route::put('products/{products}', ['as'=> 'products.update', 'uses' => 'ProductController@update']);
// Route::patch('products/{products}', ['as'=> 'products.update', 'uses' => 'ProductController@update']);
// Route::delete('products/{products}', ['as'=> 'products.destroy', 'uses' => 'ProductController@destroy']);
// Route::get('products/{products}', ['as'=> 'products.show', 'uses' => 'ProductController@show']);
// Route::get('products/{products}/edit', ['as'=> 'products.edit', 'uses' => 'ProductController@edit']);

// Route::prefix('manage')->group(function(){
// 	Route::get('/', 'ManageController@index');
// 	Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
// });

// Route::group(['prefix' => 'manage', 'middleware' => ['role:superadministrator']], function() {
//     Route::get('/', 'AdminController@welcome');
//     Route::get('/manage', ['middleware' => ['permission:manage-admins'], 'uses' => 'AdminController@manageAdmins']);
// });

// Route::get('datatables/data', 'DatatablesController@anyData')->name('datatables.data');
// Route::get('datatables', 'DatatablesController@getIndex');




http://yourhost.com/{route-name}/{template-name}/{file-name}

Route::get('tes', function(){	
	$admin->attachPermission($createProduct);
});