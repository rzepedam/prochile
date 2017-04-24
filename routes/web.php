<?php

Route::get('/', 'HomeController@index')->name("main");
Route::resource('assistances', 'AssistanceController');
Auth::routes();

