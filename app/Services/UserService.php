<?php

namespace App\Services;

use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
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
        $post = $this->postRepository->getAllPostByUserId(Auth::user()->id);

        return $post;
    }
}
