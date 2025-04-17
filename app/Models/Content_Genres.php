<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\BaseTrait as Base;

/**
 * Class Content_Genres
 * @package App\Models\Content_Genres
 *
 * @property int $id
 * @property int $target_id
 * @property int $target_type
 * @property int $genres_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Content_Genres extends Model
{
    use HasFactory, Base;
}
