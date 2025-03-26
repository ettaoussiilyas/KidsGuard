<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'color',
        'description',
        'is_special_needs',
        'display_order',
        'is_active',
    ];

    protected $casts = [
        'is_special_needs' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function learningValues()
    {
        return $this->hasMany(LearningValue::class, 'category_id');
    }
}