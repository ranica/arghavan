<?php

// use Illuminate\Http\Request;

Route::post('login', 'API\PassportController@login');
Route::post('register', 'API\PassportController@register');

Route::group(['middleware' => 'auth:api'], function(){
	Route::post('get-details', 'API\PassportController@getDetails');
	//Route::post('get-cardtype', 'API\PassportController@getCardtype');
	//Route::post('get-group', 'API\PassportController@getCardtype');
	Route::post('get-data', 'API\PassportController@getData');
	Route::post('search-user', 'API\PassportController@searchUser');
	Route::post('update-user', 'API\PassportController@UpdateUser');
	Route::post('logout', 'API\PassportController@logout');
});