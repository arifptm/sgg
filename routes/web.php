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

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role:user|super']], function() {
	Route::get('products/data', 'ProductController@data')->name('products.data');	

	Route::get('products', 'ProductController@index')->name('products.index');
	Route::post('products/store', 'ProductController@store')->name('products.store');
	Route::get('products/create', 'ProductController@create')->name('products.create');
	Route::get('products/{id}', 'ProductController@show')->name('products.show');


	Route::get('lineitems/create', 'LineitemController@create')->name('lineitems.create');
	Route::post('lineitems/store', 'LineitemController@store')->name('lineitems.store');

	Route::post('orders/checkout', 'OrderController@checkout')->name('orders.checkout');

});



Route::group(['prefix'=>'manage', 'middleware' => ['role:super|admin']], function() {

	Route::get('dashboard', 'DashboardController@index');

	Route::get('users', 'UserController@list')->name('manage.users.list');	
	Route::get('users/create', 'UserController@create')->name('manage.users.create');	
	Route::post('users/store', 'UserController@store')->name('manage.users.store');
	Route::get('users/{id}', 'UserController@show')->name('manage.users.show');	
	Route::get('users/{id}/edit', 'UserController@edit')->name('manage.users.edit');
	Route::patch('users/{id}', 'UserController@update')->name('manage.users.update');
	Route::delete('users/{id}', 'UserController@destroy')->name('manage.users.destroy');


	Route::get('products', 'ProductController@indexManage')->name('manage.products.index');
	Route::get('products/list-proposal', 'ProductController@listProposal')->name('manage.products.list-proposal');
	Route::get('products/{id}/edit', 'ProductController@edit')->name('manage.products.edit');
	Route::patch('products/{id}', 'ProductController@update')->name('manage.products.update');


	Route::get('products/create', 'ProductController@create')->name('manage.products.create');
	Route::post('products/store', 'ProductController@store')->name('manage.products.store');


	Route::delete('products/{id}', 'ProductController@edit')->name('products.edit');

	Route::get('orders', 'OrderController@index')->name('manage.orders.index');	
	Route::get('orders/create', 'OrderController@create')->name('manage.orders.create');	
	Route::post('orders/store', 'OrderController@store')->name('manage.orders.store');
	Route::get('orders/{id}', 'OrderController@show')->name('manage.orders.show');	
	Route::get('orders/{id}/edit', 'OrderController@edit')->name('manage.orders.edit');
	Route::patch('orders/{id}', 'OrderController@update')->name('manage.orders.update');
	Route::delete('orders/{id}', 'OrderController@destroy')->name('manage.orders.destroy');	



	Route::get('roles', 'RoleController@list')->name('roles.list');
	Route::post('roles/store', 'RoleController@store')->name('roles.store');
	Route::get('roles/create', 'RoleController@create')->name('roles.create');
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





Route::get('tes', function(){	
	$admin->attachPermission($createProduct);
});