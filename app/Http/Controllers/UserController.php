<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostService;
use App\Services\RepoService;
use App\Services\UserService;
use App\Services\RepoPageService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Exception\ClientException;

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
    /**
     * @var mixed
     */
    protected $repoPageService;

    /**
     * @param UserService $userService
     * @param PostService $postService
     */
    public function __construct(UserService $userService, PostService
         $postService, RepoPageService $repoPageService, RepoService $repoService) {
        $this->userService     = $userService;
        $this->postService     = $postService;
        $this->repoPageService = $repoPageService;
        $this->repoService     = $repoService;
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
        $githubUser     = Auth::user()->github();
        $githubUserName = ($githubUser) ? $githubUser->nickname : '';
        $repos          = $repoService->getUserRepos($user);

        return view('users.github', compact('repos', 'githubUserName'));
    }

    /**
     * @param $user
     * @param $repo
     */
    public function getUserGithubRepoPage($user, $repo, $page = 'readme')
    {
        try {
            $page = $this->repoPageService->getGithubRepoPage($user, $repo, $page);

            return view('github.page', compact('page'));
        } catch (ClientException $e) {
            if ($e->getResponse()->getStatusCode() == 404) {
                $page = null;

                return view('github.page', compact('page'));
            }
        }
    }

    /**
     * @param $user
     * @param $repo
     */
    public function getUserGithubRepo($user, $repo)
    {
        try {
            $repo = $this->repoService->getUserGithubRepo($user, $repo);

            return view('users.repo', compact('repo'));
        } catch (Exception $e) {
            Log::info($e->getMessage() . " in " . $e->getFile() . " in " . $e->getLine());
        }
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

    /**
     * @param Request $request
     */
    public function saveUserGithubRepoPages(Request $request)
    {
        # code...
    }
}
