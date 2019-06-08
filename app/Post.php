<?php

namespace App;

use App\Tag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
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
        'title', 'subtitle', 'body',
    ];

    /**
     * Pulls all months a post was posted with the count of posts for said month
     * to drive the archive sidebar.
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get();
    }

    /**
     * Return the author for a post.
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Return all the tags for a post.
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Adds a query scope to posts to allow quick filtration by year and month
     * used when loading out all posts to check if they are being filtered by
     * a user clicking on the archive sidebar.
     *
     * @param \Illuminate\Database\Query\Builder $query   Query to extend
     * @param array                              $filters Array of data to process
     */
    public function scopeFilter($query, array $filters)
    {
        if ($month = $filters['month'] ?? false) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = $filters['year'] ?? false) {
            $query->whereYear('created_at', $year);
        }
    }
}
