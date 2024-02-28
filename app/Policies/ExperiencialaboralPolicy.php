<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Experiencialaboral;
use App\Models\User;

class ExperiencialaboralPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Experiencialaboral');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Experiencialaboral $experiencialaboral): bool
    {
        return $user->checkPermissionTo('view Experiencialaboral');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Experiencialaboral');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Experiencialaboral $experiencialaboral): bool
    {
        return $user->checkPermissionTo('update Experiencialaboral');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Experiencialaboral $experiencialaboral): bool
    {
        return $user->checkPermissionTo('delete Experiencialaboral');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Experiencialaboral $experiencialaboral): bool
    {
        return $user->checkPermissionTo('restore Experiencialaboral');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Experiencialaboral $experiencialaboral): bool
    {
        return $user->checkPermissionTo('force-delete Experiencialaboral');
    }
}
