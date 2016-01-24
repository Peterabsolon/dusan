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

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('stuzkova', ['as' => 'stuzkova', 'uses' => 'ServiceController@stuzkova']);
Route::get('svadba', ['as' => 'svadba', 'uses' => 'ServiceController@svadba']);
Route::get('udalost', ['as' => 'udalost', 'uses' => 'ServiceController@udalost']);
Route::get('referencie', ['as' => 'referencie', 'uses' => 'ReferencesController@index']);
Route::get('kontakt', ['as' => 'kontakt', 'uses' => 'ContactController@index']);
Route::post('kontakt', ['as' => 'contact.send', 'uses' => 'ContactController@send']);

Route::group(['prefix' => config('admin.prefix', 'admin')], function () {
	Route::group(['middleware' => config('admin.filter.auth')], function () {
		Route::get('/', ['as' => 'admin.home', 'uses' => 'Admin\ServicesController@index']);

		Route::resource('services', 'Admin\ServicesController', [
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

		Route::resource('references', 'Admin\ReferencesController', [
			'except' => 'show',
			'names' => [
				'index' => 'admin.references.index',
                'create' => 'admin.references.create',
                'store' => 'admin.references.store',
                'show' => 'admin.references.show',
                'update' => 'admin.references.update',
                'edit' => 'admin.references.edit',
                'destroy' => 'admin.references.destroy',				
			],
		]);		
	});
});