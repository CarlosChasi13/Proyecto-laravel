<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Provincia;
use App\Models\User;

class ProvinciaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Provincia');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Provincia $provincia): bool
    {
        return $user->checkPermissionTo('view Provincia');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Provincia');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Provincia $provincia): bool
    {
        return $user->checkPermissionTo('update Provincia');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Provincia $provincia): bool
    {
        return $user->checkPermissionTo('delete Provincia');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Provincia $provincia): bool
    {
        return $user->checkPermissionTo('restore Provincia');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Provincia $provincia): bool
    {
        return $user->checkPermissionTo('force-delete Provincia');
    }
}
