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


/**
 * Show welcome page
 */
Route::get('/', function () {
    return view('welcome');
});


/**
 * Show Task Dashboard
 */
Route::get('/task', 'TaskController@index');

/**
 * Add New Task
 */
Route::post('/task/add', 'TaskController@add');





/**
 * Delete Task
 */
Route::delete('/task/delete/{task}', 'TaskController@delete');











Route::auth();

Route::get('/home', 'HomeController@index');
