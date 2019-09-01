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

if (getenv('APP_ENV', 'production') == 'development') {
    Auth::routes();
} else {
    Auth::routes([
        'reset' => false,
        'register' => true,
    ]);
}

Route::redirect('/home', '/');
Route::redirect('/blog', '/blog/posts');

Route::view('/', 'home')->name('home');
Route::view('/portfolio', 'portfolio')->name('portfolio');
Route::view('/about', 'about')->name('about');

Route::prefix('blog')->group(function () {
    Route::resource('posts', 'PostsController');

    Route::prefix('posts')->group(function () {
        Route::resource('tags', 'TagsController');
    });

    Route::get('posts/{post}/{slug?}', 'PostsController@show')->name('posts.show');
    Route::get('posts/tags/{tag}', 'TagsController@index')->name('tags.filter');

    Route::resource('files', 'FilesController');
});
