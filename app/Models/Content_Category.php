<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\BaseTrait as Base;

/**
 * Class Content_Category
 * @package App\Models\Content_Category
 *
 * @property int $id
 * @property int $target_id
 * @property int $target_type
 * @property int $category_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Content_Category extends Model
{
    use HasFactory, Base;
    protected $table = 'content_category';
}
