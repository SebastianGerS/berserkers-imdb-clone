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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/header', function () {
    return view('layouts.header');
});
Route::get('/item_meta_info', function () {
    return view('layouts.components.item_meta_info');
});

Route::get('/item_chart', function () {
    return view('layouts.components.item_chart');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('movies', 'MoviesController');
Route::resource('persons', 'PersonsController');
Route::resource('reviews', 'ReviewsController');
Route::resource('comments', 'CommentsController');
Route::resource('users', 'UsersController');


