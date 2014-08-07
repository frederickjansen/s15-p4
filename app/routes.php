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
Route::get('/', array('as' => 'home', 'uses' => 'PageController@index'));

// Login
Route::get('/login', array('as' => 'login', 'uses' => 'LoginController@getLogin'));
Route::post('/login', 'LoginController@postLogin');

// About
Route::get('/about', array('as' => 'about', 'uses' => 'PageController@about'));

// Contact
Route::get('/contact', array('as' => 'contact', 'uses' => 'PageController@getContact'));
Route::post('/contact', 'PageController@postContact');

// Articles
Route::get('/article', array('as' => 'articles', 'uses' => 'Article@index'));
Route::get('/article/create', array('as' => 'article_create', 'uses' => 'Article@create'));
Route::post('/article', 'Article@store');
Route::get('/article/{id}', array('as' => 'article_show', 'uses' => 'Article@show'))->where('id', '[0-9]+');
Route::get('/article/{id}/edit', array('as' => 'article_edit', 'uses' => 'Article@edit'))->where('id', '[0-9]+');
Route::put('/article/{id}', 'Article@update')->where('id', '[0-9]+');
Route::delete('/article/{id}', 'Article@destroy')->where('id', '[0-9]+');

// Comments
Route::post('/comment/{article_id}', 'Comment@postComment')->where('id', '[0-9]+');