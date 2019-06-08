<?php

namespace App\Http\Requests;

use App\Post;
use Illuminate\Foundation\Http\FormRequest;

class PostForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'subtitle' => 'required|max:500',
            'body' => 'required|max:10000',
        ];
    }

    /**
     * Save the posted form as a post.
     */
    public function persist()
    {
        $post = new Post($this->only(['title', 'subtitle', 'body']));

        $post->user_id = auth()->user()->id;
        $post->save();

        $post->tags()->sync(
            request()->get('tags')
        );

        session()->flash('flash.success', 'Post created successfully!');
    }

    /**
     * Updates a post with the posted form data.
     *
     * @param App\Post $post Post to update
     */
    public function update(Post $post)
    {
        $post->title = $this->title;
        $post->subtitle = $this->subtitle;
        $post->body = $this->body;

        $post->save();

        $post->tags()->sync(
            request()->get('tags')
        );

        session()->flash('flash.success', 'Post updated successfully!');
    }
}
