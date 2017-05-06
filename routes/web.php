<?php

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);

Route::group(['middleware' => 'auth'], function ()
{
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('/passport', function() {
        return view('passport');
    });
    Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
    Route::resource('/assistances', 'AssistanceController');
    Route::resource('/users', 'UserController');
    Route::resource('/companies', 'CompanyController');

    // Ajax request
    Route::get('/loadIndustries', 'AjaxController@loadIndustries');
});


