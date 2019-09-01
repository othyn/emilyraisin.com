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

    /**
     * Accessor to pull a computed value for the role.
     *
     * @return string The role of the user
     */
    public function getRoleAttribute(): string
    {
        return $this->is_admin ? 'Admin' : 'User';
    }

    /**
     * Return all the posts for a user.
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Return all the files for a user.
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function files()
    {
        return $this->hasMany(File::class);
    }
}
