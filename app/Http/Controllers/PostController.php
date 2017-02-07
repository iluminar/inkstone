<?php

namespace App\Http\Controllers;

use Exception;
use App\Services\PostService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\SavePostRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\DeletePostRequest;

class PostController extends Controller
{
    protected $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $posts = $this->service->getAllPostByUserIdWithPagination()->toArray();

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
            $post = $this->service->savePost($request->all());

            return redirect()->route('post.single', ['slug' => $post->slug]);
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

    public function publish($slug)
    {
        try {
            if (Request::ajax()) {
                if (Session::token() === Request::header('X-CSRF-Token')) {
                    $result = $this->service->publishPost($slug);

                    return response()->json(['status' => (bool) $result]);
                }
                return response()->json(['status' => 'error']);
            }
            return response()->json(['status' => 'error']);
        } catch (Exception $e) {
            Log::info($e->getMessage() . " in " . $e->getFile() . " in " . $e->getLine());
        }
    }

    public function delete(DeletePostRequest $request, $slug)
    {
        try {
            $this->service->deletePost($slug);

            return back();
        } catch (Exception $e) {
            Log::info($e->getMessage() . " in " . $e->getFile() . " in " . $e->getLine());
        }

    }
}
