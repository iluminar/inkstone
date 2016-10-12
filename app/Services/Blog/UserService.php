<?php

namespace App\Services\Blog;

use App\Repositories\Blog\PostRepository;
use App\Repositories\Blog\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected $userRepository;
    protected $postRepository;

    public function __construct(UserRepository $userRepository, PostRepository $postRepository)
    {
        $this->userRepository = $userRepository;
        $this->postRepository = $postRepository;
    }

    public function getUserDashboardInformation()
    {
        $post = $this->getAllPostByUserId();

        return $post;
    }

    public function getAllPostByUserId()
    {
        return $this->postRepository->getAllPostByUserIdWithPagination(Auth::user()->id);
    }
}
