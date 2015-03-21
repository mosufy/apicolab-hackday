<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

$siteRoute = function()
{
    Route::get('/', 'Site\WelcomeController@index');
};

$apiRoute = function()
{
    Route::group(array('prefix' => 'v1'), function()
    {
        Route::group(array('prefix' => 'service'), function()
        {
            Route::get('ping', 'Api\ServiceController@ping');
        });

        Route::group(array('prefix' => 'flights'), function()
        {
            Route::get('', 'Api\FlightController@index');
        });
    });
};

Route::group(array('domain' => 'apicolabhackday.dev'), $siteRoute);

Route::group(array('domain' => 'api.apicolabhackday.dev'), $apiRoute);
