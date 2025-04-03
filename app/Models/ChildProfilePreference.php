<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildProfilePreference extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_profile_id',
        'learning_value_id',
    ];

    /**
     * Get the child profile that owns the preference.
     */
    public function childProfile()
    {
        return $this->belongsTo(ChildProfile::class);
    }

    /**
     * Get the learning value associated with the preference.
     */
    public function learningValue()
    {
        return $this->belongsTo(LearningValue::class);
    }
}