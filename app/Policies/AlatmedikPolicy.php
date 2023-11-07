<?php

namespace App\Policies;

use App\Alatmedik;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AlatmedikPolicy
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
     * @param  \App\Alatmedik  $alatmedik
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Alatmedik $alatmedik)
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
     * @param  \App\Alatmedik  $alatmedik
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Alatmedik $alatmedik)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Alatmedik  $alatmedik
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Alatmedik $alatmedik)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Alatmedik  $alatmedik
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Alatmedik $alatmedik)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Alatmedik  $alatmedik
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Alatmedik $alatmedik)
    {
        //
    }
}
