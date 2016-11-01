<?php

namespace App\Http\Controllers;

use App\Services\PostService;
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

        return view('home', compact('posts'));
    }
}
