<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    })->middleware('guest');


    Route::get('/campaigns','TaskController@getCampaigns');
    Route::get('/tasks', 'TaskController@index');
    Route::post('/task', 'TaskController@store');

    Route::delete('/deleteTask/{task}', 'TaskController@destroy');

    Route::get('/campaign_contents','ContentController@index');
    Route::post('/campaign_content','ContentController@store');
    Route::get('/campaign_contents/{campaign}','ContentController@getContent');
    
    Route::put('/putContent','ContentController@putContent');
    Route::get('/getContentJson/{campaign}','ContentController@getContentJson');
    Route::post('/postContent','ContentController@postContent');

    Route::auth();

});
