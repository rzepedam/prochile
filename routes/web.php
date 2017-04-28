<?php

Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);

Route::get('/', 'HomeController@index');
Route::resource('assistances', 'AssistanceController');
Auth::routes();

