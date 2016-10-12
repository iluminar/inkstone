<?php

namespace App\Http\Controllers\Blog;

use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\SavePostRequest;
use App\Services\Blog\PostService;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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

        return view('blog.posts.index', compact('posts'));
    }

    public function single($slug)
    {
        $post = $this->service->getSinglePostBySlug($slug);

        return view('blog.posts.single', compact('post'));
    }

    public function create()
    {
        return view('blog.posts.create');
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

            return view('blog.posts.edit', compact('post'));
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

    public function publish()
    {
        try {
            if (Request::ajax()) {
                if (Session::token() === Request::header('X-CSRF-Token')) {
                    $this->service->publishPost(Request::get('slug'));

                    return response()->json(['status' => 'success']);
                }
                return response()->json(['status' => 'error']);
            }
            return response()->json(['status' => 'error']);
        } catch (Exception $e) {
            Log::info($e->getMessage() . " in " . $e->getFile() . " in " . $e->getLine());
        }
    }

    public function delete($slug)
    {
        try {
            $this->service->deletePost($slug);

            return back();
        } catch (Exception $e) {
            Log::info($e->getMessage() . " in " . $e->getFile() . " in " . $e->getLine());
        }

    }
}