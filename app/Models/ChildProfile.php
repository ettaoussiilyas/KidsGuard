<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChildProfile extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'has_adhd' => 'boolean',
        'has_autism' => 'boolean',
    ];

    /**
     * Get the parent user that owns the child profile.
     */
    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    /**
     * Get the preferences for the child profile.
     */
    public function preferences()
    {
        return $this->hasMany(ChildProfilePreference::class, 'child_profile_id');
    }
    
    /**
     * Get the learning values associated with this child profile.
     */
    public function learningValues()
    {
        return $this->belongsToMany(LearningValue::class, 'child_profile_preferences', 'child_profile_id', 'learning_value_id');
    }
    
    /**
     * Get the avatar URL for the child profile.
     */
    public function getAvatarUrlAttribute()
    {
        if (!$this->avatar) {
            return asset($this->gender == 'girl' ? 'images/avatars/girl-default.png' : 'images/avatars/boy-default.png');
        }
        
        return asset('storage/' . $this->avatar);
    }
    
}
