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

Route::get('/wc', function () {
    return view('welcome');
});

Route::get('/', 'PostController@index');

Route::post('/create/', 'PostController@store');

Route::get('/post/id/{id}', 'PostController@showById');

Route::get('/user/{id}', 'PostController@showByUserId');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
