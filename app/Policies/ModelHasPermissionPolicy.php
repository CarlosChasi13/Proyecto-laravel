<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\ModelHasPermission;
use App\Models\User;

class ModelHasPermissionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any ModelHasPermission');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ModelHasPermission $modelhaspermission): bool
    {
        return $user->checkPermissionTo('view ModelHasPermission');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create ModelHasPermission');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ModelHasPermission $modelhaspermission): bool
    {
        return $user->checkPermissionTo('update ModelHasPermission');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ModelHasPermission $modelhaspermission): bool
    {
        return $user->checkPermissionTo('delete ModelHasPermission');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ModelHasPermission $modelhaspermission): bool
    {
        return $user->checkPermissionTo('restore ModelHasPermission');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ModelHasPermission $modelhaspermission): bool
    {
        return $user->checkPermissionTo('force-delete ModelHasPermission');
    }
}
