<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Season
 *
 * @property int $id
 * @property int $series_id
 * @property int $season_number
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property Carbon|null $release
 * @property string|null $poster_url
 * @property string|null $trailer_url
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Collection|Episode[] $episodes
 *
 * @package App\Models
 */
class Season extends Model
{
	protected $table = 'season';

	protected $casts = [
		'series_id' => 'int',
		'season_number' => 'int',
		'release' => 'datetime',
		'status' => 'int'
	];

	protected $fillable = [
		'series_id',
		'season_number',
		'title',
		'slug',
		'description',
		'release',
		'poster_url',
		'trailer_url',
		'status'
	];

    public function series()
    {
        return $this->belongsTo(Series::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function hasEpisodes()
    {
        return $this->episodes()->exists();
    }

    public function countEpisodes()
    {
        return $this->episodes()->count();
    }

}
