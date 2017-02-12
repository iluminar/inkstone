<?php

namespace App\Services;

use App\Repositories\RepoRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Repositories\RepoPageRepository;

class RepoPageService
{
    /**
     * @var mixed
     */
    protected $repoPageRepository;
    /**
     * @var mixed
     */
    protected $repoRepository;
    /**
     * @var mixed
     */
    protected $userRepository;

    /**
     * @param RepoPageRepository $repoPageRepository
     * @param RepoRepository $repoRepository
     */
    public function __construct(RepoPageRepository $repoPageRepository, RepoRepository $repoRepository, UserRepository $userRepository)
    {
        $this->repoPageRepository = $repoPageRepository;
        $this->repoRepository     = $repoRepository;
        $this->userRepository     = $userRepository;
    }

    /**
     * @param $username
     * @param $repo
     * @param $page
     * @return mixed
     */
    public function getGithubRepoPage($username, $repo, $page)
    {
        $user = $this->userRepository->getIdFromUsername($username);
        $repo = $this->repoRepository->getRepoFromName($user->id, $repo);
        if (!$repo) {
            abort(404);
        }
        $page = $this->repoPageRepository->getGithubRepoPage($repo->id, $page);
        if (!$page && Auth::check() && (Auth::user()->id == $repo->user_id)) {
            $client = new \GuzzleHttp\Client(['base_uri' =>
                'https://api.github.com/']);
            $response = json_decode($client->request('Get', 'repos/' .
                Auth::user()->github()->nickname . '/' . $repo->name .
                '/readme')->getBody()->getContents());
            $data = [
                'user_id'      => Auth::user()->id,
                'repo_id'      => $repo->id,
                'name'         => 'readme',
                'slug'         => 'readme',
                'content'      => base64_decode($response->content),
                'publish_time' => date("Y-m-d H:i:s"),
            ];

            $this->repoRepository->enableRepoHasPageAttribute($repo->id);
            $page = $this->repoPageRepository->create($data);

            return $page;
        } elseif (!$page) {
            abort(404);
        }

        return $page;
    }
}
