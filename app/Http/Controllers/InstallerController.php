<?php

namespace App\Http\Controllers;

use App\Installer;
use Illuminate\Http\Request;
use App\Authorizable;

class InstallerController extends Controller
{
    use Authorizable;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Installer $installer)
    {
        return view('modules.installers.index',['installers' => $installer->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.installers.create');
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
            'address'=>'required|min:6',
            'phone'=>'required',

        );

        $this->validate($request,$rules);
        $data = request()->except(['_token','_method']);
        $data['added_by']=auth()->user()->name;
        Installer::create($data);

        return redirect()->route('installers.index')->withStatus(__('Installer successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Installer  $installer
     * @return \Illuminate\Http\Response
     */
    public function show(Installer $installer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Installer  $installer
     * @return \Illuminate\Http\Response
     */
    public function edit(Installer $installer)
    {
        return view('modules.installers.update',compact('installer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Installer  $installer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Installer $installer)
    {
        $rules =array(
            'name'=>'required|min:3',
            'address'=>'required|min:6',
            'phone'=>'required',

        );
        $this->validate($request,$rules);
        $data = request()->except(['_token','_method']);
        $data['added_by']=auth()->user()->name;

        Installer::whereId($installer->id)->update($data);
        return redirect()->route('installers.index')->withStatus(__('Project Installer successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Installer  $installer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Installer $installer)
    {
        $installer->delete();

        return redirect()->route('installers.index')->withStatus(__('Installer successfully deleted.'));
    }
}
