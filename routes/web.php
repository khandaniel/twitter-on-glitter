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

Route::get('/', 'TweetController@index');

Route::get('/post/id/{id}', 'TweetController@showById');

Route::get('/user/{id}', 'TweetController@showByUserId');

Route::get('/repost', 'TweetController@repost');

Route::resources([
    'post' => 'TweetController'
]);

Auth::routes();

Route::post('/home', 'HomeController@uploadData');
Route::put('/home', 'HomeController@uploadImage');

Route::get('/home', 'HomeController@index')->name('home');




Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
