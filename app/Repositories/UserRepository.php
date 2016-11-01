<?php

namespace App\Repositories;

use App\Models\User;
use Rinvex\Repository\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.blog.user';
    protected $model = 'App\Models\User';
}
