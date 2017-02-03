<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\RepoPage;
use Illuminate\Support\Facades\Auth;
use Rinvex\Repository\Repositories\EloquentRepository;

class RepoPageRepository extends EloquentRepository
{
    /**
     * @var string
     */
    protected $model = 'App\Models\RepoPage';

    /**
     * @var string
     */
    protected $repositoryId = 'rinvex.repository.repo_page';

    public function getGithubRepoPage($repoId, $name = 'readme')
    {
        return RepoPage::where(['repo_id' => $repoId, 'slug' => $name])->first();
    }
}
