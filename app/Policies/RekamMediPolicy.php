<?php

namespace App\Policies;

use App\RekamMedi;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RekamMediPolicy
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
        dd($user->isAdmin());
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\RekamMedi  $rekamMedi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user)
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
     * @param  \App\RekamMedi  $rekamMedi
     * @return \Illuminate\Auth\Access\Response|bool
     */

    public function update(User $user, RekamMedi $rekamMedi)
    {
        dd($user->isAdmin());
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\RekamMedi  $rekamMedi
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, RekamMedi $rekamMedi)
    {
        dd($user);
        return $user->isAdmin() || $user->isCreator();
    }
}
