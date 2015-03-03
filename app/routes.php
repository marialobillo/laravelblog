<?php

Route::get('/', [
	'as' => 'home',
	'uses' => 'HomeController@getHome'
]);


Route::resource('roles', 'RolesController');
Route::resource('users', 'UsersController');



Route::group(['before' => 'guest'], function(){

	
	//Para los formularios (POST)
	Route::group(['before' => 'crsf'], function(){

		


	});


	

	
	


});