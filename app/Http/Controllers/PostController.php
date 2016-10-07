<?php

namespace App\Http\Controllers;

use Exception;
use App\Http\Requests\SavePostRequest;
use App\Services\PostService;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    protected $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $posts = $this->service->getAllPostByUserId()->toArray();

        return view('posts.index', compact('posts'));
    }

    public function single($slug)
    {
        $post = $this->service->getSinglePostBySlug($slug);

        return view('posts.single', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(SavePostRequest $request)
    {
        try {
            $result = $this->service->savePost($request->all());

            return redirect('dashboard');
        } catch (Exception $e) {
            Log::info($e->getMessage() . " in " . $e->getFile() . " in " . $e->getLine());
        }
    }

    public function edit($slug)
    {
        try {
            $post = $this->service->getSinglePostBySlug($slug);

            return view('posts.edit', compact('post'));
        } catch (Exception $e) {
            Log::info($e->getMessage() . " in " . $e->getFile() . " in " . $e->getLine());
        }
    }

    public function update(SavePostRequest $request)
    {
        try {
            $result = $this->service->updatePost($request->all());

            return redirect()->route('post.single', ['slug' => $post->slug]);
        } catch (Exception $e) {
            Log::info($e->getMessage() . " in " . $e->getFile() . " in " . $e->getLine());
        }
    }
}
