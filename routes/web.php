<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
	
	Route::get('login', ['as' => 'login','uses' => 'UserController@getLogin']);
	Route::post('login', ['as' => 'postLogin','uses' => 'UserController@postLogin']);
	Route::get('logout', ['as' => 'logout','uses' => 'UserController@logout']);

	Route::group(['middleware' => 'login'], function() {

		Route::get('home', ['as' => 'home', 'uses' => 'UserController@index']);
		
		Route::any('{all}', 'UserController@getLogin')->where(['all' => '.*']);

		
		Route::post('upload-avatar', 'UserController@upload');

		Route::post('update-profile', ['as' => 'updateProfile', 'uses' => 'UserController@updateProfile']);
	});
	
});

