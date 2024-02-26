<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Genero;
use App\Models\User;

class GeneroPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Genero');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Genero $genero): bool
    {
        return $user->checkPermissionTo('view Genero');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Genero');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Genero $genero): bool
    {
        return $user->checkPermissionTo('update Genero');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Genero $genero): bool
    {
        return $user->checkPermissionTo('delete Genero');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Genero $genero): bool
    {
        return $user->checkPermissionTo('restore Genero');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Genero $genero): bool
    {
        return $user->checkPermissionTo('force-delete Genero');
    }
}
