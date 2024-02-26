<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Sigla;
use App\Models\User;

class SiglaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Sigla');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Sigla $sigla): bool
    {
        return $user->checkPermissionTo('view Sigla');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Sigla');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Sigla $sigla): bool
    {
        return $user->checkPermissionTo('update Sigla');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Sigla $sigla): bool
    {
        return $user->checkPermissionTo('delete Sigla');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Sigla $sigla): bool
    {
        return $user->checkPermissionTo('restore Sigla');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Sigla $sigla): bool
    {
        return $user->checkPermissionTo('force-delete Sigla');
    }
}
