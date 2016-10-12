<?php

namespace App\Services\Blog;

use App\Repositories\Blog\PostRepository;
use App\Repositories\Blog\CommentRepository;
use Illuminate\Support\Facades\Auth;

class CommentService
{
    protected $commentRepository;
    protected $postRepository;

    public function __construct(CommentRepository $commentRepository, PostRepository $postRepository)
    {
        $this->commentRepository = $commentRepository;
        $this->postRepository = $postRepository;
    }

    public function saveComment($data, $slug)
    {
        $data['user_id'] = Auth::user()->id;
        $data['post_id'] = $this->postRepository->getSinglePostBySlug($slug)->id;
        $comment = $this->commentRepository->create($data);

        return $comment;
    }

    public function getAllCommentsOfSinglePost($value='')
    {
        # code...
    }
}
