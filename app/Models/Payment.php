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
 * @property-read User $user
 * @property-read Subscription $subscription
 * @package App\Models
 */
class Payment extends Model
{
    const STATUS_PENDING = 2;
    const STATUS_SUCCESS = 1;
    const STATUS_FAILED = 0;

    public static array $arrStatus = [
        self::STATUS_PENDING => 'Đang xử lý',
        self::STATUS_SUCCESS => 'Thành công',
        self::STATUS_FAILED => 'Thất bại',
    ];

    public static array $arrStatusLabel = [
        self::STATUS_SUCCESS => 'bg-success',
        self::STATUS_PENDING => 'bg-warning',
        self::STATUS_FAILED => 'bg-danger',
    ];

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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_uuid', 'uuid');
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class, 'subscription_id', 'id');
    }

    public function getStatusTextAttribute()
    {
        return self::$arrStatus[$this->status] ?? 'Unknown';
    }

    public function getStatusLabelAttribute()
    {
        return self::$arrStatusLabel[$this->status];
    }
}
