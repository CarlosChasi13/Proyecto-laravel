<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Docenteareaconocimiento;
use App\Models\User;

class DocenteareaconocimientoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Docenteareaconocimiento');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Docenteareaconocimiento $docenteareaconocimiento): bool
    {
        return $user->checkPermissionTo('view Docenteareaconocimiento');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Docenteareaconocimiento');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Docenteareaconocimiento $docenteareaconocimiento): bool
    {
        return $user->checkPermissionTo('update Docenteareaconocimiento');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Docenteareaconocimiento $docenteareaconocimiento): bool
    {
        return $user->checkPermissionTo('delete Docenteareaconocimiento');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Docenteareaconocimiento $docenteareaconocimiento): bool
    {
        return $user->checkPermissionTo('restore Docenteareaconocimiento');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Docenteareaconocimiento $docenteareaconocimiento): bool
    {
        return $user->checkPermissionTo('force-delete Docenteareaconocimiento');
    }
}
