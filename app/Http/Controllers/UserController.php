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
        $info = (object) ['post' => $this->service->getUserDashboardInformation()];

        return view('users.dashboard', compact('info'));
    }

    public function getUserAllPost($user)
    {
        $posts = $this->service->getAllPostByUserId()->toArray();
        $owner = true;

        return view('users.post', compact('posts', 'owner'));
    }

    public function getUserGithubData($user)
    {
        $client = new \GuzzleHttp\Client(['base_uri' => 'https://api.github.com/users/']);
        $repos = json_decode($client->request('Get', Auth::user()->socials->where('provider', 'github')->first()->nickname . '/repos')->getBody()->getContents());

        return view('users.github', compact('repos'));
    }

    public function createGithubPage($user, $repo)
    {
        return view('github.page');
    }
}
