<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $clients = \App\Client::all()->count();
        $reports = \App\Report::all()->count();
        $project =\App\Project::all()->count();
        return view('dashboard',compact('clients','project','reports'));
    }
}
