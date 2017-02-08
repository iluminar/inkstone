<?php

namespace App\Services;

use App\Repositories\TagRepository;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;

class PostService
{
    protected $postRepository;
    protected $tagRepository;

    public function __construct(PostRepository $postRepository, TagRepository $tagRepository)
    {
        $this->postRepository = $postRepository;
        $this->tagRepository  = $tagRepository;
    }

    public function savePost($data)
    {
        $data['user_id'] = Auth::user()->id;
        $data['slug']    = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $data['title']));
        if ($data['publish_time'] == "") {
            $data['publish_time'] = date("Y-m-d H:i:s");
        }
        $post = $this->postRepository->create($data);
        if (isset($data['tags'])) {
            $tags = $this->tagRepository->createTagsAndReturnIds(collect(explode(',', str_replace(' ', '', $data['tags']))));
            $post->tags()->attach($tags);
        }

        return $post;
    }

    public function getAllPost()
    {
        return $this->postRepository->getAllPost();
    }

    public function getAllPostByUserIdWithPagination()
    {
        return $this->postRepository->getAllPostByUserIdWithPagination(Auth::user()->id);
    }

    public function getSinglePostBySlug($slug)
    {
        return $this->postRepository->getSinglePostBySlug($slug);
    }

    public function publishPost($slug)
    {
        return $this->postRepository->publishPost($slug);
    }

    public function deletePost($slug)
    {
        return $this->postRepository->deletePost($slug);
    }

    public function updatePost($slug, $data)
    {
        unset($data['_method'], $data['_token']);

        return $this->postRepository->updatePost($slug, $data);
    }
}
