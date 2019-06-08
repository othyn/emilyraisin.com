<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostForm;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth.admin')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()
            ->filter(request(['year', 'month']))
            ->paginate(5);

        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::orderBy('name', 'asc')->get();

        return view('blog.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\PostForm $form
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PostForm $form)
    {
        $form->persist();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Post $post
     * @param string    $slug
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, $slug = '')
    {
        $post->body = (new \Parsedown())->text($post->body);

        if ($slug !== $post->slug) {
            return redirect()->to($post->url);
        }

        return view('blog.show', compact('post'))
            ->withCanonical($post->url);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::orderBy('name', 'asc')->get();

        return view('blog.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\PostForm $form
     * @param \App\Post                   $post
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PostForm $form, Post $post)
    {
        $form->update($post);

        return redirect()->route('posts.show', ['id' => $post->encoded_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        session()->flash('flash.success', 'Post deleted successfully!');

        return redirect()->route('posts.index');
    }
}
