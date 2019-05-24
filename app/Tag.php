<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
