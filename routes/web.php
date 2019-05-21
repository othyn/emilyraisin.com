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

Route::view('/', 'home')->name('home');
Route::view('/portfolio', 'portfolio')->name('portfolio');
Route::view('/about', 'about')->name('about');

Route::get('/blog', 'PostsController@index')->name('posts');
Route::get('/blog/posts/create', 'PostsController@create')->name('posts.create'); // Add middleware for admin check
Route::post('/blog/posts', 'PostsController@store')->name('posts.store'); // Add middleware for admin check
Route::get('/blog/posts/{post}', 'PostsController@show')->name('posts.show');

Auth::routes();
