<?php

namespace App\Repositories;

use App\Models\User;
use Rinvex\Repository\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository
{
    /**
     * @var string
     */
    protected $repositoryId = 'rinvex.repository.blog.user';
    /**
     * @var string
     */
    protected $model = 'App\Models\User';

    /**
     * @param $username
     */
    public function getIdFromUsername($username)
    {
        return User::where('username', $username)->first(['id']);
    }
}
