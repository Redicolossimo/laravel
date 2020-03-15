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

//Route::get('/login', 'UserController@index')->name('login');

Route::get('/', 'HomeController@home')->name('home');
Route::get('/home', 'HomeController@home')->name('home');

Route::match(['post','get'], '/profile', 'ProfileController@update')->name('updateProfile');

Route::get('/auth/{provider}', 'LoginController@loginProvider')->name('providerLogin');
Route::get('/auth/{provider}/response', 'LoginController@responseProvider')->name('providerResponse');

//Route::get('/auth/vkontakte', 'LoginController@loginVK')->name('vkLogin');
//Route::get('/auth/vkontakte/response', 'LoginController@responseVK')->name('vkResponse');
//
//Route::get('/auth/facebook', 'LoginController@loginFB')->name('fbLogin');
//Route::get('/auth/facebook/response', 'LoginController@responseFB')->name('fbResponse');



Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'is_admin']
], function () {
    Route::get('/parser', 'ParserController@index')->name('parser');
    Route::get('/parserNews', 'ParserController@getParsedNews')->name('parserNews');

    Route::get('/users', 'UserController@index')->name('users');
    Route::get('/deleteUser{user}', 'UserController@delete')->name('deleteUser');
    Route::get('/users/toggleAdmin/{user}', 'UserController@toggleAdmin')->name('toggleAdmin');

    Route::resource('/news', 'NewsController')->except('show');


    Route::get('/test1', 'AdminController@test1')->name('test1');
    Route::get('/test2', 'AdminController@test2')->name('test2');
});

Route::group(
    [
        'prefix' => 'news',
        'as' => 'news.'
    ], function () {
    Route::get('/all', 'NewsController@news')->name('all');
    Route::get('/one/{news}', 'NewsController@newsOne')->name('one');
    Route::get('/categories', 'NewsController@categories')->name('categories');
    Route::get('/category/{category}', 'NewsController@categoryId')->name('categoryId');
}
);


Auth::routes();
