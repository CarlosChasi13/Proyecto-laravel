<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Docente;
use App\Models\User;

class DocentePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Docente');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Docente $docente): bool
    {
        return $user->checkPermissionTo('view Docente');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Docente');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Docente $docente): bool
    {
        return $user->checkPermissionTo('update Docente');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Docente $docente): bool
    {
        return $user->checkPermissionTo('delete Docente');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Docente $docente): bool
    {
        return $user->checkPermissionTo('restore Docente');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Docente $docente): bool
    {
        return $user->checkPermissionTo('force-delete Docente');
    }
}
