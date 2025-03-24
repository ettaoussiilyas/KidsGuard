<?php

namespace App\Policies;

use App\Models\ChildProfile;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChildProfilePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ChildProfile $childProfile)
    {
        return $user->id === $childProfile->parent_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ChildProfile $childProfile)
    {
        return $user->id === $childProfile->parent_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ChildProfile $childProfile)
    {
        return $user->id === $childProfile->parent_id;
    }
}
