<?php

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);

Route::group(['middleware' => 'auth'], function ()
{
    /*
     * Rol Controlqtime, Director Nacional, Director Regional, Staff
     */
    // Logout
    Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

    // Assistances
    Route::resource('/assistances', 'AssistanceController');

    // Attendances
    Route::get('/attendances', 'AttendanceController@index');

    // Companies
    Route::resource('/companies', 'CompanyController');

    // Users
    Route::get('/users/{id}/edit', ['as' => 'users.edit', 'uses' => 'UserController@edit']);
    Route::put('/users/{id}', ['as' => 'users.update', 'uses' => 'UserController@update']);

    /*
     * Rol Controlqtime, Director Nacional, Director Regional
     */
    Route::group(['middleware' => 'role:dir_reg'], function ()
    {
        // Reports
        Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
    });

    /*
     * Rol Controlqtime
     */
    Route::group(['middleware' => 'role:cqtime'], function ()
    {
        // ImportExcel
        Route::get('/import-assistances', 'AssistanceController@importCsv');
        Route::get('/import-companies', 'CompanyController@importCsv');

        // Passport
        Route::get('/passport', function ()
        {
            return view('passport');
        });

        //User
        Route::get('/users', ['as' => 'users.index', 'uses' => 'UserController@index']);
        Route::get('/users/create', ['as' => 'users.create', 'uses' => 'UserController@create']);
        Route::post('/users', ['as' => 'users.store', 'uses' => 'UserController@store']);
        Route::delete('/users/{id}', ['as' => 'users.destroy', 'uses' => 'UserController@destroy']);

        // Biometry
        Route::resource('/biometries', 'BiometryController');
    });
});


