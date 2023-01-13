<?php

namespace App\Policies;

use App\Biaya;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BiayaPolicy
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
     * @param  \App\Biaya  $biaya
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Biaya $biaya)
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
     * @param  \App\Biaya  $biaya
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Biaya $biaya)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Biaya  $biaya
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Biaya $biaya)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Biaya  $biaya
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Biaya $biaya)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Biaya  $biaya
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Biaya $biaya)
    {
        return $user->isAdmin() || $user->isCreator();
    }
}
