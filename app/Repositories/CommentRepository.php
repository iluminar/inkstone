<?php

namespace App\Repositories;

use Rinvex\Repository\Repositories\EloquentRepository;

class CommentRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.comment';
    protected $model = 'App\Models\Comment';
}
