<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Watch_History
 *
 * @property int $id
 * @property string $user_uuid
 * @property int $target_id
 * @property int $target_type
 * @property int|null $series_id
 * @property int|null $season_id
 * @property int|null $episode_id
 * @property int $progress_seconds
 * @property int $duration_seconds
 * @property int $is_finished
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Watch_History extends Model
{
	protected $table = 'watch_history';

	protected $casts = [
		'user_uuid' => 'string',
		'target_id' => 'int',
		'target_type' => 'int',
		'series_id' => 'int',
		'season_id' => 'int',
		'episode_id' => 'int',
		'progress_seconds' => 'int',
		'duration_seconds' => 'int',
		'is_finished' => 'int'
	];

	protected $fillable = [
		'user_uuid',
		'target_id',
		'target_type',
		'series_id',
		'season_id',
		'episode_id',
		'progress_seconds',
		'duration_seconds',
		'is_finished'
	];
}
