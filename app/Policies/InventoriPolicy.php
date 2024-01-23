<?php

namespace App\Policies;

use App\Inventori;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InventoriPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Inventori  $inventori
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Inventori $inventori)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Inventori  $inventori
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Inventori $inventori)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Inventori  $inventori
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Inventori $inventori)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Inventori  $inventori
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Inventori $inventori)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Inventori  $inventori
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Inventori $inventori)
    {
        //
    }
}
