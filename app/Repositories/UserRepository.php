<?php

namespace App\Repositories;

use App\Models\User;
use Rinvex\Repository\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.post';
    protected $model = 'App\Models\Post';
}
