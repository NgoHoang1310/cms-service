<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\BaseTrait as Base;

/**
 * App\Models\Movie
 *
 * @property int $id
 * @property string $title
 * @property string $uuid
 * @property string|null $description
 * @property string|null $release
 * @property int|null $duration
 * @property string|null $actors
 * @property string|null $directors
 * @property string|null $poster_url
 * @property string|null $trailer_url
 * @property string|null $backdrop_url
 * @property float|null $rating
 * @property int $status
 * @property int|null $is_hot
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Category[] $categories
 */
class Movie extends Model
{
    use HasFactory, Base;

    /**
     * Summary of table
     * @var string
     */
    protected $table = 'movie';
    protected $fillable = [
        'title',
        'uuid',
        'description',
        'release',
        'duration',
        'actors',
        'directors',
        'poster_url',
        'trailer_url',
        'backdrop_url',
        'rating',
        'status',
        'is_hot'
    ];

    protected $casts = [
        'release' => 'date',
    ];

    protected static function booted()
    {
        static::deleting(function ($movie) {
            $movie->categories()->detach(); // Xóa các bản ghi liên kết
            $movie->genres()->detach(); // Xóa các bản ghi liên kết
        });
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'content_category', 'target_id', 'category_id')
            ->using(Content_Category::class)
            ->withPivot('target_type')
            ->withTimestamps();
    }

    public function genres()
    {
        return $this->belongsToMany(Genres::class, 'content_genres', 'target_id', 'genre_id')
            ->using(Content_Genres::class)
            ->withPivot('target_type')
            ->withTimestamps();
    }
}
