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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' =>  'auth'], function() {

	Route::resources([
		'products' => 'ProductController',
		'providers' => 'ProviderController',
		'clients' => 'ClientController',
		'dispatches' => 'DispatchController',
		'orders' => 'OrderController'
	]);

	Route::get('maintenance', 'MaintenanceController@index')
		->name('maintenance.index');

	Route::get('maintenance/users/create', 'MaintenanceController@usersCreate')
		->name('maintenance.user.create');
	
	Route::post('maintenance/users/store', 'MaintenanceController@usersStore')
		->name('users.store');

	Route::post('maintenance/shape/store', 'MaintenanceController@shapeStore')
		->name('shape.store');

	Route::group(['prefix' => 'api'], function() {
		Route::get('states', 'StateController@get');
		
		Route::get('get/{state_id}/cities-and-municipalities', 
			'StateController@getCitiesAndMunicipalities');

		Route::get('parishes/{municipality_id}', 
			'MunicipalityController@getParish');
		
		Route::get('{id}/client', 'ClientController@get');
		Route::get('{id}/provider', 'ProviderController@get');
		Route::get('products/get', 'ProductController@get');
	});
});