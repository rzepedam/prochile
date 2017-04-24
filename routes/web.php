<?php

Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);

Route::get('/', 'HomeController@index')->name("main");
Route::resource('assistances', 'AssistanceController');
Auth::routes();

