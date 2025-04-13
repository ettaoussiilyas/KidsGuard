<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentCategory extends Model
{
    use HasFactory;

    protected $table = 'content_categories';
    
    protected $fillable = [
        'name',
        'slug',
        'icon',
        'color',
        'description',
        'is_special_needs',
        'display_order',
        'is_active'
    ];

    public function learningValues()
    {
        return $this->hasMany(LearningValue::class, 'category_id');
    }
}