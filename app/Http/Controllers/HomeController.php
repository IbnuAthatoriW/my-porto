<?php

namespace App\Http\Controllers;

use App\Services\GitHubService;

class HomeController extends Controller
{
    protected GitHubService $gitHubService;

    public function __construct(GitHubService $gitHubService)
    {
        $this->gitHubService = $gitHubService;
    }

    public function index()
    {
        $projects = $this->gitHubService->getRepositories();

        return view('home', compact('projects'));
    }
}
