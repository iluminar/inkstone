<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use App\Services\RepoService;
use App\Services\UserService;
use App\Services\RepoPageService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @var mixed
     */
    protected $postService;

    /**
     * @var mixed
     */
    protected $userService;
    protected $repoPageService;

    /**
     * @param UserService $userService
     * @param PostService $postService
     */
    public function __construct(UserService $userService, PostService
         $postService, RepoPageService $repoPageService) {
        $this->userService     = $userService;
        $this->postService     = $postService;
        $this->repoPageService = $repoPageService;
    }

    /**
     * @param $user
     */
    public function dashboard($user)
    {
        $info = (object) ['post' => $this->userService
                ->getUserDashboardInformation()];

        return view('users.dashboard', compact('info'));
    }

    /**
     * @param $user
     */
    public function getUserAllPost($user)
    {
        $posts = $this->userService->getAllPostByUserId()->toArray();
        $owner = true;

        return view('users.post', compact('posts', 'owner'));
    }

    /**
     * @param RepoService $repoService
     * @param $user
     */
    public function getUserGithubData(RepoService $repoService, $user)
    {
        // check db for user github data if not give button to refresh
        $githubUser     = Auth::user()->github();
        $githubUserName = ($githubUser) ? $githubUser->nickname : '';
        $repos          = $repoService->getUserRepos($user);

        return view('users.github', compact('repos', 'githubUserName'));
    }

    /**
     * @param $user
     * @param $repo
     */
    public function getUserGithubRepoPage($user, $repo)
    {
        $page = $this->repoPageService->getGithubRepoPage($repo);

        return view('github.page', compact('page'));
    }

    /**
     * @param  RepoService $repoService
     * @param  $user
     * @return mixed
     */
    public function refreshUserLatestGithubData(RepoService $repoService,
        $user) {
        try {
            $repos = $repoService->refreshUserLatestGithubData($user);

            return redirect()->route('user.github', [$user]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
