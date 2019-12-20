<?php

namespace App\Http\Controllers;

use App\Project;
use DB;
use Illuminate\Http\Request;
use App\Personel;
use App\Authorizable;
class ProjectController extends Controller
{
    use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        return view('modules.projects.index',['projects'=>$project->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = DB::table('clients')->groupBy('name')
            ->pluck('name','id');
        $personnels= Personel::pluck('name','id');
        return view('modules.projects.create',compact('clients','personnels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules =array(
            'name'=>'required|min:3',
            'client'=>'required|min:3',
            'area'=>'required|min:3',

        );
        $this->validate($request,$rules);

        $data = request()->except(['_token','_method']);

        $data['created_by']=auth()->user()->name;
        Project::create($data);

        return redirect()->route('projects.index')->withStatus(__('Project successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->withStatus(__('Project successfully deleted.'));
    }

    public function getarea($client){
        $area = DB::table('clients')->where('name',$client)->pluck("area","area");;
        return json_encode($area);
    }
}
