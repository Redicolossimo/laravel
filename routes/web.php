<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', ['uses' => 'HomeController@home']);
Route::get('/home', ['uses' => 'HomeController@home']);

Route::get('/login', ['uses' =>'UserController@index']);

Route::get('/news', ['uses' => 'NewsController@index']);
Route::get('/news/{id}', ['uses' => 'NewsController@getOne']);

Route::get('/categories', ['uses' => 'NewsController@categories']);
Route::get('/categories/{id}', ['uses' => 'NewsController@getCategory']);

