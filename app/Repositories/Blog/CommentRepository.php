<?php

namespace App\Repositories\Blog;

use Rinvex\Repository\Repositories\EloquentRepository;

class CommentRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.comment';
    protected $model = 'App\Models\Blog\Comment';
}
