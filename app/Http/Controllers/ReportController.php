<?php

namespace App\Http\Controllers;
use App\Personel;
use App\Project;
use App\Report;
use App\Installer;
use Illuminate\Http\Request;
use App\Authorizable;
class ReportController extends Controller
{
    use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Report $report)
    {
        return view('modules.reports.index',['reports' => $report->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personnels =Personel::pluck('name','id');
        $installers =Installer::pluck('name','id');
        $projects =Project::where('status','=',0)->pluck('id','name');
        return view('modules.reports.create',compact('projects','installers','personnels'));
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
            'project_id'=> 'required|unique:reports,project_id',
//            'installer'=> 'required',
//            'personnel'=> 'required',
            't_fabrication'=> 'required',
            't_profile'=> 'required',
            'no_screws'=> 'required',
            't_erection'=> 'required',
            't_spacing'=> 'required',
            't_align'=> 'required',
            't_anchor'=> 'required',
            'c_details'=> 'required',
            'b_details'=> 'required',
            'brc_bcb'=> 'required',
            'wr_wb'=> 'required',
            'tcb'=> 'required',
            'w_stiffener'=> 'required',
            'w_beam'=> 'required',
            't_brace'=> 'required',
            'p_fascia'=> 'required',
            'p_spacing'=> 'required',
            'f_fixing'=> 'required',
            'f_alignment'=> 'required',
            'r_cover'=> 'required',
            'c_type'=> 'required',
            'f_spacing'=> 'required',
            'v_ridges'=> 'required',
            'w_flashing'=> 'required',
            's_touch'=> 'required',
            'comments'=> 'required',
            'filename'=>'required',
            'filename.*'=>'image|mimes:jpeg,png,jpg,gif,svg,PNG|max:20000',
        );
        $this->validate($request,$rules);
        $data = request()->except(['_token','_method']);

        if($request->hasfile('filename'))
        {

            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);
                $pic[] = $name.date('d-m-Y-H-i');
            }
        }

        if($request->has('personnel')){
            $data['personnel']=implode(",",$request->personnel);
        }

        $data['filename']=implode(",",$pic);
        $data['inspected_by']=auth()->user()->name;
        $data['prepared_by']=auth()->user()->name;
        $data['confirmed_by']=$request->installer;
        $project = Project::with('report')->findOrFail($request->project_id);
        $report = new Report($data);
        $report->project()->associate($project)->save();

        return redirect()->route('reports.index')->withStatus(__('Project Report successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();

        return redirect()->route('reports.index')->withStatus(__('Report successfully deleted.'));
    }
}
