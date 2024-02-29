<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Publicacioncientifica;
use App\Models\User;

class PublicacioncientificaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any Publicacioncientifica');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Publicacioncientifica $publicacioncientifica): bool
    {
        return $user->checkPermissionTo('view Publicacioncientifica');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create Publicacioncientifica');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Publicacioncientifica $publicacioncientifica): bool
    {
        return $user->checkPermissionTo('update Publicacioncientifica');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Publicacioncientifica $publicacioncientifica): bool
    {
        return $user->checkPermissionTo('delete Publicacioncientifica');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Publicacioncientifica $publicacioncientifica): bool
    {
        return $user->checkPermissionTo('restore Publicacioncientifica');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Publicacioncientifica $publicacioncientifica): bool
    {
        return $user->checkPermissionTo('force-delete Publicacioncientifica');
    }
}
