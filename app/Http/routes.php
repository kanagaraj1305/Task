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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','TaskController@index');
Route::get('/create','TaskController@create');
Route::post('/store','TaskController@store');
Route::get('/edit/{id}','TaskController@edit');
Route::post('/update/{id}','TaskController@update');
Route::get('/delete/{id}','TaskController@destroy');