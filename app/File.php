<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        'overview',
        'path',
        'url',
        'size',
        'mime',
    ];
}
