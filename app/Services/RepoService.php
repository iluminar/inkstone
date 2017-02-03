<?php

namespace App\Services;

use App\Repositories\PostRepository;
use App\Repositories\RepoRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class RepoService
{
    protected $repoRepository;

    public function __construct(RepoRepository $repoRepository)
    {
        $this->repoRepository = $repoRepository;
    }

    public function getUserRepos($user)
    {
        return $this->repoRepository->getUserRepos($user);
    }

    public function refreshUserLatestGithubData($user)
    {
        $client = new \GuzzleHttp\Client(['base_uri' => 'https://api.github.com/users/']);
        $repos = json_decode($client->request('Get', Auth::user()->socials->where('provider', 'github')->first()->nickname . '/repos')->getBody()->getContents());
        return $this->repoRepository->syncUserLatestGithubData(collect($repos));
    }
}
