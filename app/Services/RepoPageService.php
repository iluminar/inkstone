<?php

namespace App\Services;

use App\Repositories\RepoPageRepository;
use App\Repositories\RepoRepository;
use Illuminate\Support\Facades\Auth;

class RepoPageService
{
    protected $repoPageRepository;
    protected $repoRepository;

    public function __construct(RepoPageRepository $repoPageRepository, RepoRepository $repoRepository)
    {
        $this->repoPageRepository = $repoPageRepository;
        $this->repoRepository = $repoRepository;
    }

    public function getGithubRepoPage($repo)
    {
        $repoId = $this->repoRepository->getRepoIdFromName(Auth::user()->id, $repo);
        $page = $this->repoPageRepository->getGithubRepoPage($repoId);
        if (!$page) {
            $client = new \GuzzleHttp\Client(['base_uri' =>
                'https://api.github.com/']);
            $response = json_decode($client->request('Get', 'repos/' .
                Auth::user()->socials->where('provider', 'github')->first()
                    ->nickname . '/' . $repo .
                '/readme')->getBody()->getContents());
            $data = [
                'user_id' => Auth::user()->id,
                'repo_id' => $repoId,
                'name' => 'readme',
                'slug' => 'readme',
                'content' => base64_decode($response->content),
                'publish_time' => date("Y-m-d H:i:s"),
            ];

            $this->repoRepository->enableRepoHasPageAttribute($repoId);
            list($result, $page) = $this->repoPageRepository->create($data);

            return $page;
        }

        return $page;
    }
}
