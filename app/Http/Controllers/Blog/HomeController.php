<?php

namespace App\Http\Controllers\Blog;

use App\Services\Blog\PostService;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostService $service)
    {
        $posts = $service->getAllPost()->toArray();

        return view('blog.home', compact('posts'));
    }
}
