<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    /*
     * Enable soft deleting
     */
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Set the field to bind to the route key in the route model binding.
     *
     * @return string The db field to bind
     */
    public function getRouteKeyName()
    {
        return 'name';
    }

    /**
     * Return all the posts for a tag.
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
