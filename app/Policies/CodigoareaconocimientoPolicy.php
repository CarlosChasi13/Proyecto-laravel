<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Codigoareaconocimiento;
use App\Models\User;

class CodigoareaconocimientoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Codigoareaconocimiento');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Codigoareaconocimiento $codigoareaconocimiento): bool
    {
        return $user->checkPermissionTo('view Codigoareaconocimiento');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Codigoareaconocimiento');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Codigoareaconocimiento $codigoareaconocimiento): bool
    {
        return $user->checkPermissionTo('update Codigoareaconocimiento');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Codigoareaconocimiento $codigoareaconocimiento): bool
    {
        return $user->checkPermissionTo('delete Codigoareaconocimiento');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Codigoareaconocimiento $codigoareaconocimiento): bool
    {
        return $user->checkPermissionTo('restore Codigoareaconocimiento');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Codigoareaconocimiento $codigoareaconocimiento): bool
    {
        return $user->checkPermissionTo('force-delete Codigoareaconocimiento');
    }
}
