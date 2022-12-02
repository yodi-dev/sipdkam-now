<?php

namespace App\Policies;

use App\User;
use App\RekamMedis;
use Illuminate\Auth\Access\HandlesAuthorization;

class RekamMedisPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can see the tags.
     *
     * @param  \App\User  $user
     * @return boolean
     */
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
    public function update(User $user, RekamMedis $rekammedis)
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
    public function delete(User $user, RekamMedis $rekammedis)
    {
        return ($user->isAdmin() || $user->isCreator());
    }

    public function forceDelete(User $user, RekamMedis $rekammedis)
    {
        return $user->isAdmin() || $user->isCreator();
    }
}
