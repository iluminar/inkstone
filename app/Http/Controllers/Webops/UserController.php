<?php

namespace App\Http\Controllers\Webops;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\Webops\UserService;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function dashboard($user)
    {
    }
}
