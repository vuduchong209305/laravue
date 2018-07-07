<?php

Route::get('/', ['uses' => 'Admin\UserController@getLogin']);

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
	
	Route::get('login', ['as' => 'login','uses' => 'UserController@getLogin']);
	Route::post('login', ['as' => 'postLogin','uses' => 'UserController@postLogin']);
	Route::get('logout', ['as' => 'logout','uses' => 'UserController@logout']);

	Route::group(['middleware' => 'login'], function() {

		Route::get('home', ['as' => 'home', 'uses' => 'UserController@dashboard']);
		Route::post('updateProfile', 'UserController@updateProfile');
		Route::post('updateAvatar', 'UserController@updateAvatar');

		Route::group(['prefix' => 'regent'], function() {
			Route::get('index', ['uses' => 'UserController@index']);
			Route::post('add', ['uses' => 'UserController@store']);
			Route::delete('delete', ['uses' => 'UserController@deleteRegent']);
		});
	});

});

/*Route::any('{all}', 'Admin\UserController@getLogin')->where(['all' => '.*']);*/

Route::any('{all}', function () {
    return view('admin.home');
})->where(['all' => '.*']);