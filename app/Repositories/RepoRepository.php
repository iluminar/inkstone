<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Repo;
use Illuminate\Support\Facades\Auth;
use Rinvex\Repository\Repositories\EloquentRepository;

class RepoRepository extends EloquentRepository
{
    /**
     * @var string
     */
    protected $model = 'App\Models\Repo';

    /**
     * @var string
     */
    protected $repositoryId = 'rinvex.repository.repo';

    /**
     * @param $user
     */
    public function getUserRepos($user)
    {
        return Repo::where('user_id', Auth::user()->id)->get();
    }

    /**
     * @param  $repos
     * @return mixed
     */
    public function syncUserLatestGithubData($repos)
    {
        $now = Carbon::now();
        $repos->transform(function ($item, $key) use ($now) {
            return [
                'user_id'     => Auth::user()->id,
                'name'        => $item->name,
                'description' => $item->description,
                'language'    => $item->language,
                'stars'       => $item->stargazers_count,
                'forks'       => $item->forks_count,
                'private'     => $item->private,
                'forked'      => $item->fork,
                'created_at'  => $now,
                'updated_at'  => $now,
            ];
        });
        $existingRepos = Repo::where('user_id', Auth::user()->id)
            ->whereIn('name', $repos->pluck('name'))->pluck('name');
        $newRepos = $repos->reject(function ($value, $key) use ($existingRepos) {
            return in_array($value['name'], $existingRepos->toArray());
        });
        Repo::insert($newRepos->toArray());

        return Repo::where('user_id', Auth::user()->id)->get();
    }

    /**
     * @param $userId
     * @param $repo
     */
    public function getRepoIdFromName($userId, $repo)
    {
        $repo = Repo::where(['user_id' => $userId, 'name' => $repo])->first(['id']);
        return ($repo) ? $repo->id : null;
    }

    /**
     * @param $userId
     * @param $repo
     */
    public function getRepoFromName($userId, $repo)
    {
        return Repo::where(['user_id' => $userId, 'name' => $repo])->first();
    }

    /**
     * @param $repoId
     */
    public function enableRepoHasPageAttribute($repoId)
    {
        Repo::where('id', $repoId)->update(['has_page' => true]);
    }
}
