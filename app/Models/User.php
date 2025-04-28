<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\BaseTrait as Base;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $uuid
 * @property string $email
 * @property string $user_name
 * @property string|null $password
 * @property string|null $avatar_link
 * @property string|null $phone_number
 * @property string $provider
 * @property string|null $birthday
 * @property string|null $last_login
 * @property int $role
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Base;

    const ROLE_USER = 0;
    const ROLE_ADMIN = 1;

    public static array $arrRole = [
        self::ROLE_USER => 'Người dùng',
        self::ROLE_ADMIN => 'Quản trị viên',
    ];

    /**
     * Summary of table
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'email',
        'password',
        'user_name',
        'avatar_link',
        'phone_number',
        'role',
        'birthday',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'birthday' => 'date',
    ];

    public function isEditable()
    {
        return $this->provider === 'password';
    }
}
