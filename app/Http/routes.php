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

$siteRoute = function()
{
    Route::get('/', 'Site\HomeController@index');
    Route::get('welcome', 'Site\WelcomeController@index');

    Route::group(array('prefix' => 'flights'), function()
    {
        Route::get('', 'Site\FlightController@index');
        Route::get('swipe-right/{id}', 'Site\FlightController@swipeRight');
        Route::get('swipe-left/{id}', 'Site\FlightController@swipeLeft');
    });
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
            Route::group(array('middleware' => 'csrf'), function()
            {
                Route::get('', 'Api\FlightController@index');
            });
        });
    });
};

Route::group(array('domain' => 'apicolabhackday.dev'), $siteRoute);
Route::group(array('domain' => 'apicolabhackday.mosufy.com'), $siteRoute);

Route::group(array('domain' => 'api.apicolabhackday.dev'), $apiRoute);
