<?php

namespace App\Services\Webops;

use App\Repositories\Webops\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserDashboardInformation()
    {
    }
}
