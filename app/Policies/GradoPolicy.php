<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Grado;
use App\Models\User;

class GradoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Grado');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Grado $grado): bool
    {
        return $user->checkPermissionTo('view Grado');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Grado');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Grado $grado): bool
    {
        return $user->checkPermissionTo('update Grado');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Grado $grado): bool
    {
        return $user->checkPermissionTo('delete Grado');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Grado $grado): bool
    {
        return $user->checkPermissionTo('restore Grado');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Grado $grado): bool
    {
        return $user->checkPermissionTo('force-delete Grado');
    }
}
