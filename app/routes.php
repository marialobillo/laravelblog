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


		//Acceder a la cuenta (POST)
		Route::post('account/signin', [
			'as' => 'account-signin-post',
			'uses' => 'AccountController@postSignin'
		]);
		


	});

	//Acceder a la cuenta (GET)
	Route::get('account/signin', [
		'as' => 'account-signin',
		'uses' => 'AccountController@getSignin'	
	]);


	

	
	


});