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
        'size',
        'mime',
    ];

    /**
     * Return the user for the file.
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
