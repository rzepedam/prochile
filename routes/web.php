<?php

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);

Route::group(['middleware' => 'auth'], function ()
{
    Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

    // Assistances
    Route::resource('/assistances', 'AssistanceController');

    // Attendances
    Route::get('/attendances', 'AttendanceController@index');

    // Companies
    Route::resource('/companies', 'CompanyController');

    // Ajax request
    Route::get('/loadIndustries', 'AjaxController@loadIndustries');
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

    // Users
    Route::get('/users/{id}/edit', ['as' => 'users.edit', 'uses' => 'UserController@edit']);
    Route::put('/users/{id}', ['as' => 'users.update', 'uses' => 'UserController@update']);

    Route::group(['middleware' => 'role:cqtime'], function ()
    {
        // Passport
        Route::get('/passport', function ()
        {
            return view('passport');
        });

        //User
        Route::get('/users', ['as' => 'users.index', 'uses' => 'UserController@index']);
        Route::get('/users/create', ['as' => 'users.create', 'uses' => 'UserController@create']);
        Route::post('/users', ['as' => 'users.store', 'uses' => 'UserController@store']);

        // Biometry
        Route::resource('/biometries', 'BiometryController');
    });
});


