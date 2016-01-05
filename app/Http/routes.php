<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => config('admin.prefix', 'admin')], function () {
	Route::group(['middleware' => config('admin.filter.auth')], function () {
		Route::get('/', ['as' => 'admin.home', 'uses' => 'ServicesController@index']);

		Route::resource('services', 'ServicesController', [
			'except' => 'show',
			'names' => [
				'index' => 'admin.services.index',
                'create' => 'admin.services.create',
                'store' => 'admin.services.store',
                'show' => 'admin.services.show',
                'update' => 'admin.services.update',
                'edit' => 'admin.services.edit',
                'destroy' => 'admin.services.destroy',				
			],
		]);
	});
});