<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Requests;

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

        return view('users.dashboard', compact('info'));
    }

    public function getUserAllPost($user)
    {
        $posts = $this->service->getAllPostByUserId()->toArray();

        return view('users.post', compact('posts'));
    }
}
