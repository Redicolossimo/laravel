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

Route::get('/login', 'UserController@index')->name('login');



Route::get('/', 'HomeController@home')->name('home');
Route::get('/home', 'HomeController@home')->name('home');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    Route::get('/news', 'NewsController@all')->name('news');
    Route::match(['post','get'],'/addNews', 'NewsController@add')->name('addNews');
    Route::get('/updateNews{news}', 'NewsController@update')->name('updateNews');
    Route::post('/saveNews{news}', 'NewsController@save')->name('saveNews');
    Route::get('/deleteNews{news}', 'NewsController@delete')->name('deleteNews');

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
    Route::get('/category/{id}', 'NewsController@categoryId')->name('categoryId');
}
);

