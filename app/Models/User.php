<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'avatar',
        'provider',
        'provider_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


    public function hasRole($role): bool
    {
        if (is_string($role)) {
            return $this->roles->contains('slug', $role);
        }
        
        return (bool) $role->intersect($this->roles)->count();
    }


    public function hasAnyRole($roles): bool
    {
        if (is_string($roles)) {
            return $this->hasRole($roles);
        }
        
        foreach ($roles as $role) {
            if ($this->hasRole($role)) {
                return true;
            }
        }
        
        return false;
    }


    public function hasPermission($permission): bool
    {
        foreach ($this->roles as $role) {
            if ($role->permissions->contains('slug', $permission)) {
                return true;
            }
        }
        
        return false;
    }


    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('slug', $role)->firstOrFail();
        }
        
        $this->roles()->syncWithoutDetaching($role);
        return $this;
    }


    public function removeRole($role)
    {
        if (is_string($role)) {
            $role = Role::where('slug', $role)->firstOrFail();
        }
        
        $this->roles()->detach($role);
        return $this;
    }

    // Add this method to your User model class

    /**
     * Get the child profiles for the user.
     */
    public function childProfiles()
    {
        return $this->hasMany(ChildProfile::class, 'parent_id');
    }

    /**
     * Get the user's avatar URL.
     *
     * @return string
     */
    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            return asset('storage/avatars/' . $this->avatar);
        }
        
        return asset('images/default-avatar.png');
    }

    // /**
    //  * The "booted" method of the model.
    //  *
    //  * @return void
    //  */
    // protected static function booted()
    // {
    //     static::deleting(function ($user) {
    //         // This will run for both soft deletes and force deletes
    //         if ($user->avatar) {
    //             Storage::delete('public/avatars/' . $user->avatar);
    //         }
    //     });
        
    //     // If you want to handle force delete differently
    //     static::forceDeleting(function ($user) {
    //         // Additional cleanup for permanent deletion
    //     });
    // }


        /**
         * Get the newsletter subscription for the user.
         */
        public function newsletterSubscription()
        {
            return $this->hasOne(NewsletterSubscription::class);
        }

        /**
         * Check if the user is subscribed to the newsletter.
         */
        public function isSubscribedToNewsletter()
        {
            return $this->newsletterSubscription && $this->newsletterSubscription->is_subscribed;
        }
    }