<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\ModelHasRole;
use App\Models\User;

class ModelHasRolePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any ModelHasRole');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ModelHasRole $modelhasrole): bool
    {
        return $user->checkPermissionTo('view ModelHasRole');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create ModelHasRole');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ModelHasRole $modelhasrole): bool
    {
        return $user->checkPermissionTo('update ModelHasRole');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ModelHasRole $modelhasrole): bool
    {
        return $user->checkPermissionTo('delete ModelHasRole');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ModelHasRole $modelhasrole): bool
    {
        return $user->checkPermissionTo('restore ModelHasRole');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ModelHasRole $modelhasrole): bool
    {
        return $user->checkPermissionTo('force-delete ModelHasRole');
    }
}
