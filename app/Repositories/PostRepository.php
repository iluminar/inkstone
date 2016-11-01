<?php

namespace App\Repositories;

use App\Models\Post;
use Rinvex\Repository\Repositories\EloquentRepository;

class PostRepository extends EloquentRepository
{
    protected $repositoryId = 'rinvex.repository.post';
    protected $model = 'App\Models\Post';

    public function getAllPostByUserIdWithPagination($id)
    {
        return Post::where('user_id', $id)->with('author.socials')->paginate();
    }

    public function getAllPostByUserId($id)
    {
        return Post::where('user_id', $id)->get();
    }

    public function getAllPost()
    {
        return Post::with('author.socials')->where('draft', true)->paginate();
    }

    public function getSinglePostBySlug($slug)
    {
        return Post::where('slug', $slug)->with(['author.socials', 'comments.author.socials', 'tags'])->first();
    }

    public function publishPost($slug)
    {
        $draft = Post::where('slug', $slug)->first()->draft;

        return Post::where('slug', $slug)->update(['draft' => !$draft]);
    }

    public function deletePost($slug)
    {
        return Post::where('slug', $slug)->delete();
    }
}
