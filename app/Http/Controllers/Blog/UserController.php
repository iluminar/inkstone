<?php

namespace App\Http\Controllers\Blog;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\Blog\UserService;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function dashboard($user)
    {
        $info = (object) ['post' => $this->service->getUserDashboardInformation()];

        return view('blog.users.dashboard', compact('info'));
    }

    public function getUserAllPost($user)
    {
        $posts = $this->service->getAllPostByUserId()->toArray();
        $owner = true;

        return view('blog.users.post', compact('posts', 'owner'));
    }
}
