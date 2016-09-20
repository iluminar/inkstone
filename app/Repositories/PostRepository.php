<?php

namespace App\Repositories;

use App\Models\Post;
use Rinvex\Repository\Repositories\EloquentRepository;

class PostRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.uniqueid';
    protected $model = 'App\Models\Post';

    public function getAllPostByUserId($id)
    {
        return $this->paginate();
    }

    public function getSinglePostBySlug($slug)
    {
        return Post::where('slug', $slug)->with('author.socials')->first();
    }
}
