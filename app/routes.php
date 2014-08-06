<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Index
Route::get('/', 'PageController@index');

// Login
Route::get('/login', 'LoginController@getLogin');
Route::post('/login', 'LoginController@postLogin');

// About
Route::get('/about', 'PageController@about');

// Contact
Route::get('/contact', 'PageController@getContact');
Route::post('/contact', 'PageController@postContact');

// Articles
Route::get('/article', 'Article@index');
Route::get('/article/create', 'Article@create');
Route::post('/article', 'Article@store');
Route::get('/article/{id}', 'Article@show');
Route::get('/article/{id}/edit', 'Article@edit');
Route::put('/article/{id}', 'Article@update');
Route::delete('/article/{id}', 'Article@destroy');

// Comments
Route::post('/comment/{article_id}', 'Comment@postComment');