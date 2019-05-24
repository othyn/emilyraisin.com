<?php

use App\Tag;
use App\Post;
use Illuminate\Database\Seeder;

class PostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::all();

        Post::all()->each(function ($post) use ($tags) {
            $post->tags()->attach(
                $tags->random(rand(1, $tags->count()))->pluck('id')->toArray()
            );
        });
    }
}
