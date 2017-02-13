<?php

namespace App\Services;

use App\Repositories\RepoRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class RepoService
{
    /**
     * @var mixed
     */
    protected $repoRepository;

    /**
     * @param RepoRepository $repoRepository
     */
    public function __construct(RepoRepository $repoRepository, UserRepository $userRepository)
    {
        $this->repoRepository = $repoRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @param $user
     * @return mixed
     */
    public function getUserRepos($user)
    {
        return $this->repoRepository->getUserRepos($user);
    }

    /**
     * @param $user
     * @return mixed
     */
    public function refreshUserLatestGithubData($user)
    {
        $client = new \GuzzleHttp\Client(['base_uri' => 'https://api.github.com/users/']);
        $repos  = json_decode($client->request('Get', Auth::user()->socials->where('provider', 'github')->first()->nickname . '/repos')->getBody()->getContents());

        return $this->repoRepository->syncUserLatestGithubData(collect($repos));
    }

    /**
     * @param $user
     * @param $repo
     * @return mixed
     */
    public function getUserGithubRepo($user, $repo)
    {
        $user = $this->userRepository->getIdFromUsername($user);

        return $this->repoRepository->getUserGithubRepo($user->id, $repo);
    }
}
