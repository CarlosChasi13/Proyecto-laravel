<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Nrc;
use App\Models\User;

class NrcPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Nrc');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Nrc $nrc): bool
    {
        return $user->checkPermissionTo('view Nrc');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Nrc');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Nrc $nrc): bool
    {
        return $user->checkPermissionTo('update Nrc');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Nrc $nrc): bool
    {
        return $user->checkPermissionTo('delete Nrc');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Nrc $nrc): bool
    {
        return $user->checkPermissionTo('restore Nrc');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Nrc $nrc): bool
    {
        return $user->checkPermissionTo('force-delete Nrc');
    }
}
