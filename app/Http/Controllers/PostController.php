<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\SavePostRequest;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(PostService $service)
    {
        $posts = $service->getAllPostByUserId();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(SavePostRequest $request, PostService $service)
    {
        try {
            $service->savePost($request->all());

            return redirect('dashboard');
        } catch (Exception $e) {
            \Log::info($e->getMessage() . " in " . $e->getFile() . " in " . $e->getLine());
        }
    }
}
