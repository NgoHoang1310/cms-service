<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 *
 * @property int $id
 * @property string $user_uuid
 * @property int $user_subscription_id
 * @property float $amount
 * @property Carbon $payment_date
 * @property string|null $transaction_id
 * @property string $bank_code
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Payment extends Model
{
	protected $table = 'payment';

	protected $casts = [
		'user_subscription_id' => 'int',
		'amount' => 'float',
        'payment_date' => 'datetime',
		'transaction_id' => 'int',
		'status' => 'int'
	];

	protected $fillable = [
		'user_uuid',
		'subscription_id',
		'amount',
		'payment_date',
		'transaction_id',
		'bank_code',
		'status'
	];
}
