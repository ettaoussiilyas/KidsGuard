<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PermissionRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'permission_id',
        'role_id',
        'created_at',
        'updated_at'
    ];

    // public function roles(): BelongsToMany
    // {
    //     return $this->belongsToMany(Role::class);
    // }

    // public function permission(): BelongsToMany
    // {
    //     return $this->belongsToMany(Permission::class);
    // }
}
