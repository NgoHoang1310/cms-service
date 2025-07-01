<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Subscription
 *
 * @property int $id
 * @property string $user_uuid
 * @property int $plan_id
 * @property int|null $voucher_id
 * @property Carbon $start_date
 * @property Carbon $next_bill_at
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read Plan $plan
 * @package App\Models
 */
class Subscription extends Model
{
	protected $table = 'subscription';

	protected $casts = [
		'subscription_id' => 'int',
		'start_date' => 'datetime',
		'end_date' => 'datetime',
		'status' => 'int'
	];

	protected $fillable = [
		'user_uuid',
		'subscription_id',
		'start_date',
		'end_date',
		'status'
	];

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id', 'id');
    }
}
