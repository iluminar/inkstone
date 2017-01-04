<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function dashboard($user)
    {
        dd(Auth::user()->socials->first());
        $info = (object) ['post' => $this->service->getUserDashboardInformation()];

        return view('users.dashboard', compact('info'));
    }

    public function getUserAllPost($user)
    {
        $posts = $this->service->getAllPostByUserId()->toArray();
        $owner = true;

        return view('users.post', compact('posts', 'owner'));
    }
}
