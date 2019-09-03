<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'user_id', 'original_name', 'name', 'path', 'size', 'mime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'url',
    ];

    /**
     * Custom accessor to generate the path
     * ...as a URL
     * ...as a property.
     *
     * @return string
     */
    public function getUrlAttribute(): string
    {
        return asset("storage/{$this->path}");
    }

    /**
     * Return the user for the file.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Adds a query scope to limit the items returned to the list endpoint.
     *
     * @param \Illuminate\Database\Query\Builder $query Query to extend
     */
    public function scopeList($query): void
    {
        $query->select('id', 'original_name', 'created_at', 'path');
    }
}
