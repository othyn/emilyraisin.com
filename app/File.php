<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    /*
     * Enable soft deletes
     */
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'original_name',
        'name',
        'path',
        'size',
        'mime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['url'];

    /**
     * Custom accessor to generate the path
     * ...as a URL
     * ...as a property
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return asset("storage/{$this->path}");
    }

    /**
     * Return the user for the file.
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Adds a query scope to limit the items returned to the list endpoint.
     *
     * @param \Illuminate\Database\Query\Builder $query   Query to extend
     */
    public function scopeList($query)
    {
        $query->select('id', 'original_name', 'created_at', 'path');
    }
}
