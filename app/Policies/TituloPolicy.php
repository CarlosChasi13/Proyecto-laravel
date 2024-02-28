<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Titulo;
use App\Models\User;

class TituloPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Titulo');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Titulo $titulo): bool
    {
        return $user->checkPermissionTo('view Titulo');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Titulo');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Titulo $titulo): bool
    {
        return $user->checkPermissionTo('update Titulo');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Titulo $titulo): bool
    {
        return $user->checkPermissionTo('delete Titulo');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Titulo $titulo): bool
    {
        return $user->checkPermissionTo('restore Titulo');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Titulo $titulo): bool
    {
        return $user->checkPermissionTo('force-delete Titulo');
    }
}
