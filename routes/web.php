<?php

Route::get('/', 'HomeController@index');
Route::resource('clients', 'ClientController');
Auth::routes();

