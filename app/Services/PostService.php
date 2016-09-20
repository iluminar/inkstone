<?php

namespace App\Services;

use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;

class PostService
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    function savePost($data)
    {
        $data['user_id'] = Auth::user()->id;
        $data['slug'] = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['title']));
        if ($data['publish_time']== "") {
            $data['publish_time'] = date("Y-m-d H:i:s");
        }
        $post = $this->postRepository->create($data);

        return $post;
    }

    public function getAllPost()
    {
        return $this->postRepository->paginate();
    }

    public function getAllPostByUserId()
    {
        return $this->postRepository->getAllPostByUserId(Auth::user()->id);
    }

    public function getSinglePostBySlug($slug)
    {
        return $this->postRepository->getSinglePostBySlug($slug);
    }
}
