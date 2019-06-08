<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /*
     * Enable notifications
     */
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    /**
     * Accessor to pull a computed value for the role.
     *
     * @return string The role of the user
     */
    {
        return $this->hasMany(Post::class);
    }

    public function publish(Post $post)
    /**
     * Return all the posts for a user.
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    {
        $post = $this->posts()->save($post);

        $post->tags()->sync(
            request()->get('tags')
        );

        return $post;
    }
}
