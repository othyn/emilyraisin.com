<?php

namespace App\Providers;

use App\Tag;
use App\Post;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('blog.sidebar', function ($view) {
            $archives = Post::archives();

            $tags = Tag::has('posts')
                ->orderBy('name', 'asc')
                ->with('posts')
                ->get();

            $view->with(compact('archives', 'tags'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
