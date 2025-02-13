<?php

namespace App\Policies;

use App\Enum\RolesAndPermissions;
use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can(RolesAndPermissions::CAN_VIEW_USERS);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return $user->can(RolesAndPermissions::CAN_VIEW_USERS);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can(RolesAndPermissions::CAN_CREATE_USER);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return $user->can(RolesAndPermissions::CAN_UPDATE_USER);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return $user->can(RolesAndPermissions::CAN_DELETE_USER);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return $user->can(RolesAndPermissions::CAN_RESTORE_USER);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return $user->can(RolesAndPermissions::CAN_DELETE_USER);
    }
}
