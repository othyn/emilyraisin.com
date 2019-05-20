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

Route::view('/', 'home');
Route::view('/portfolio', 'portfolio');
Route::view('/about', 'about');

Route::get('/blog', 'PostsController@index');
Route::get('/blog/posts/{post}', 'PostsController@show');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
