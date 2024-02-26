<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Periodoacademico;
use App\Models\User;

class PeriodoacademicoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Periodoacademico');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Periodoacademico $periodoacademico): bool
    {
        return $user->checkPermissionTo('view Periodoacademico');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Periodoacademico');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Periodoacademico $periodoacademico): bool
    {
        return $user->checkPermissionTo('update Periodoacademico');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Periodoacademico $periodoacademico): bool
    {
        return $user->checkPermissionTo('delete Periodoacademico');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Periodoacademico $periodoacademico): bool
    {
        return $user->checkPermissionTo('restore Periodoacademico');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Periodoacademico $periodoacademico): bool
    {
        return $user->checkPermissionTo('force-delete Periodoacademico');
    }
}
