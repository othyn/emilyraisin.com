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

Auth::routes();

Route::redirect('/home', '/');
Route::redirect('/blog', '/blog/posts');

Route::view('/', 'home')->name('home');
Route::view('/portfolio', 'portfolio')->name('portfolio');
Route::view('/about', 'about')->name('about');

Route::prefix('blog')->group(function () {
    Route::resource('posts', 'PostsController');
    // TODO: Add middleware for admin check
});
