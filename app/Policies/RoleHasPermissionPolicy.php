<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\RoleHasPermission;
use App\Models\User;

class RoleHasPermissionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any RoleHasPermission');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, RoleHasPermission $rolehaspermission): bool
    {
        return $user->checkPermissionTo('view RoleHasPermission');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create RoleHasPermission');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, RoleHasPermission $rolehaspermission): bool
    {
        return $user->checkPermissionTo('update RoleHasPermission');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, RoleHasPermission $rolehaspermission): bool
    {
        return $user->checkPermissionTo('delete RoleHasPermission');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, RoleHasPermission $rolehaspermission): bool
    {
        return $user->checkPermissionTo('restore RoleHasPermission');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, RoleHasPermission $rolehaspermission): bool
    {
        return $user->checkPermissionTo('force-delete RoleHasPermission');
    }
}
