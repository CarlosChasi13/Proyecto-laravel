<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Areaconocimiento;
use App\Models\User;

class AreaconocimientoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Areaconocimiento');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Areaconocimiento $areaconocimiento): bool
    {
        return $user->checkPermissionTo('view Areaconocimiento');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Areaconocimiento');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Areaconocimiento $areaconocimiento): bool
    {
        return $user->checkPermissionTo('update Areaconocimiento');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Areaconocimiento $areaconocimiento): bool
    {
        return $user->checkPermissionTo('delete Areaconocimiento');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Areaconocimiento $areaconocimiento): bool
    {
        return $user->checkPermissionTo('restore Areaconocimiento');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Areaconocimiento $areaconocimiento): bool
    {
        return $user->checkPermissionTo('force-delete Areaconocimiento');
    }
}
