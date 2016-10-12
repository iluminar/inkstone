<?php

namespace App\Http\Controllers\Blog;

use Exception;
use App\Http\Controllers\Controller;
use App\Services\Blog\CommentService;
use App\Http\Requests\SaveCommentRequest;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    protected $service;

    public function __construct(CommentService $service)
    {
        $this->service = $service;
    }

    public function store(SaveCommentRequest $request)
    {
        try {
            $result = $this->service->saveComment($request->all(), $request->route('slug'));

            return redirect()->route('post.single', ['slug' => $request->route('slug')]);
        } catch (Exception $e) {
            Log::info($e->getMessage() . " in " . $e->getFile() . " in " . $e->getLine());
        }
    }
}
