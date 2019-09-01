<?php

namespace App\Providers;

use App\Tag;
use App\Post;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        view()->composer('blog.sidebar', function ($view) {
            $archives = Post::archives();

            $tags = Tag::orderBy('name', 'asc')
                ->with('posts')
                ->get();

            $view->with(compact('archives', 'tags'));
        });

        view()->composer('layouts.header', function ($view) {
            $isPost = (!isset($view->posts) && isset($view->post));
            $segmentOne = ucfirst(request()->segment(1));

            $author = 'Emily Raisin';
            $baseTags = 'Emily Raisin,copywriter,freelance,creative,blog';

            $viewData = [
                'headerAuthor' => $author,
                'headerTitle' => ($segmentOne ? "{$author} - {$segmentOne}" : $author),
                'headerSubtitle' => 'Freelance copywriter. I’m creative, but I also understand briefs and deadlines. If that sounds like the type of person you would like to work with, contact me.',
                'headerTags' => $baseTags,
                'headerImage' => url('/img/me.jpeg'),
                'headerUrl' => url()->current(),
                'headerOgType' => 'website',
                'headerOgTypeArticle' => false,
                'headerOgTypeArticlePublishedTime' => '',
                'headerOgTypeArticleModifiedTime' => '',
            ];

            if ($isPost) {
                if ($view->post->title) {
                    $viewData['headerTitle'] = "{$author} - {$segmentOne} - {$view->post->title}";
                }

                if ($view->post->subtitle) {
                    $viewData['headerSubtitle'] = $view->post->subtitle;
                }

                if ($view->post->tags) {
                    $viewData['headerTags'] = $baseTags . ',' . $view->post->tags->pluck('name')->implode(',');
                }

                $viewData['headerOgType'] = 'article';
                $viewData['headerOgTypeArticlePublishedTime'] = $view->post->created_at->toIso8601String();
                $viewData['headerOgTypeArticleModifiedTime'] = $view->post->updated_at->toIso8601String();
            }

            $viewData['headerOgTypeArticle'] = ($viewData['headerOgType'] == 'article');

            $view->with($viewData);
        });
    }

    /**
     * Register any application services.
     */
    public function register()
    {
    }
}
