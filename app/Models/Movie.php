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
 * @property string|null $description
 * @property string|null $release
 * @property int|null $duration
 * @property string|null $actors
 * @property string|null $dỉrectors
 * @property string|null $poster_url
 * @property string|null $trailer_url
 * @property string|null $backdrop_url
 * @property float|null $rating
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

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'content_category');
    }
}
