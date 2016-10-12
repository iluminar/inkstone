<?php

namespace App\Repositories\Webops;

use App\Models\User;
use Rinvex\Repository\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.webops.user';
    protected $model = 'App\Models\User';
}
