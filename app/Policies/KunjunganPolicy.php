<?php

namespace App\Policies;

use App\User;
use App\Kunjungan;
use Illuminate\Auth\Access\HandlesAuthorization;

class KunjunganPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->isCreator() || $user->isMember();
    }

    public function view(User $user, Kunjungan $kunjungan)
    {
        return $user->isAdmin() || $user->isCreator() || $user->isCreator();
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
    public function update(User $user, Kunjungan $kunjungan)
    {
        return ($user->isAdmin() || $user->isCreator() || $user->isMember());
    }

    /**
     * Determine whether the user can delete the tag.
     *
     * @param  \App\User  $user
     * @param  \App\Tag  $tag
     * @return boolean
     */
    public function delete(User $user, Kunjungan $kunjungan)
    {
        return ($user->isAdmin() || $user->isCreator());
    }
}
