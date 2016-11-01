<?php

namespace App\Http\Controllers;

use Exception;
use App\Services\CommentService;
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
