<?php

namespace App\Http\Controllers\Webops;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function create()
    {
        return view('webops.projects.create');
    }
}
