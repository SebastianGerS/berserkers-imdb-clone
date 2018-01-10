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

Route::get('/catalog', function () {
    return view('catalog');
})->name('catalog');

Route::get('/inputs', function () {
    return view('layouts.components.input');
});

Route::get('/gallery', function () {
    return view('layouts.components.gallery');
})->name('gallery');

Auth::routes();

Route::resource('movies', 'MoviesController');
Route::resource('persons', 'PersonsController');
Route::resource('reviews', 'ReviewsController');
Route::resource('comments', 'CommentsController');
Route::resource('users', 'UsersController');