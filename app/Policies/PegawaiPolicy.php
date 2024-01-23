<?php

namespace App\Policies;

use App\Pegawai;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PegawaiPolicy
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
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Pegawai $pegawai)
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
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Pegawai $pegawai)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Pegawai $pegawai)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Pegawai $pegawai)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Pegawai $pegawai)
    {
        //
    }
}
