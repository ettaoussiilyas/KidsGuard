<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChildProfile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'parent_id',
        'name',
        'age',
        'avatar',
        'gender',
        'has_adhd',
        'has_autism',
        'special_needs',
        'interests',
        'hobbies',
        'skills',   
    ];

    protected $casts = [
        'has_adhd' => 'boolean',
        'has_autism' => 'boolean',
    ];

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            return asset('storage/' . $this->avatar);
        }
        
        return asset('images/child_avatr.png');
    }

    public function learningValues()
    {
        return $this->belongsToMany(LearningValue::class, 'child_profile_preferences')
                ->withTimestamps();
    }

    /**
     * Get the preferences for the child profile.
     */
    public function preferences()
    {
        return $this->hasMany(ChildProfilePreference::class, 'child_profile_id');
    }
}
