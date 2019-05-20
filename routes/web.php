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

Route::get('/blog', 'PostsController@index')->name('posts');
Route::get('/blog/posts/create', 'PostsController@create')->name('posts.create'); // Add middleware for admin check
Route::get('/blog/posts/{post}', 'PostsController@show')->name('posts.show');

Auth::routes();
