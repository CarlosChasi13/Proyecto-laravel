<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Capacitacion;
use App\Models\User;

class CapacitacionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Capacitacion');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Capacitacion $capacitacion): bool
    {
        return $user->checkPermissionTo('view Capacitacion');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Capacitacion');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Capacitacion $capacitacion): bool
    {
        return $user->checkPermissionTo('update Capacitacion');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Capacitacion $capacitacion): bool
    {
        return $user->checkPermissionTo('delete Capacitacion');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Capacitacion $capacitacion): bool
    {
        return $user->checkPermissionTo('restore Capacitacion');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Capacitacion $capacitacion): bool
    {
        return $user->checkPermissionTo('force-delete Capacitacion');
    }
}
