<?php

namespace App\Policies;

use App\Models\Repo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RepoPolicy
{
    use HandlesAuthorization;

    /**
     * @param  User   $user
     * @param  Repo   $repo
     * @return boolean
     */
    public function view(User $user, Repo $repo)
    {
        return $user->id == $repo->user_id;
    }
}
