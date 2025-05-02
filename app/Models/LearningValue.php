<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'icon',
        'color',
        'background_color',
        'age_min',
        'age_max',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'age_min' => 'integer',
        'age_max' => 'integer',
    ];

    // public function category()
    // {
    //     return $this->belongsTo(ContentCategory::class, 'category_id');
    // }

    public function categories()
    {
        return $this->belongsToMany(ContentCategory::class, 'category_learning_value', 'learning_value_id', 'category_id');
    }

    public function childProfiles()
    {
        return $this->belongsToMany(ChildProfile::class, 'child_profile_preferences')
                    ->withTimestamps();
    }
}