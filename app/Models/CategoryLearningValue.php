<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CategoryLearningValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'learning_value_id',
        'created_at',
        'updated_at'
    ];

}
