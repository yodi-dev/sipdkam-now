<?php

namespace App\Policies;

use App\Pemeriksaan;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PemeriksaanPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can create tags.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->isCreator();
    }

    /**
     * Determine whether the user can update the tag.
     *
     * @param  \App\User  $user
     * @param  \App\Tag  $tag
     * @return boolean
     */
    public function update(User $user, Pemeriksaan $pemeriksaan)
    {
        return ($user->isAdmin() || $user->isCreator());
    }

    /**
     * Determine whether the user can delete the tag.
     *
     * @param  \App\User  $user
     * @param  \App\Tag  $tag
     * @return boolean
     */
    public function delete(User $user, Pemeriksaan $pemeriksaan)
    {
        return ($user->isAdmin() || $user->isCreator());
    }
}
