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
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'url_name',
    ];

    /**
     * Set the field to bind to the route key in the route model binding.
     *
     * @return string The db field to bind
     */
    public function getRouteKeyName(): string
    {
        return 'name';
    }

    /**
     * Custom accessor to generate a url safe version of the tag name.
     *
     * @return string
     */
    public function getUrlNameAttribute(): string
    {
        return urlencode($this->name);
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
