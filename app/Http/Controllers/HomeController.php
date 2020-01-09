<?php

namespace App\Http\Controllers;

use DB;

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
        $pms = DB::table('projects')
                ->select('created_by', DB::raw('count(*) as total'))
                ->groupBy('created_by')
                ->get();
        $rpts = DB::table('reports')
            ->select('prepared_by', DB::raw('count(*) as total'))
            ->groupBy('prepared_by')
            ->get();

//return $user_info;
        return view('dashboard',compact('clients','project','reports','pms','rpts'));
    }
}
