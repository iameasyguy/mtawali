<?php

namespace App\Http\Controllers;

use App\Personel;
use Illuminate\Http\Request;
use App\Authorizable;
class PersonelController extends Controller
{
    use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Personel $personel)
    {
        return view('modules.personnel.index',['personels' => $personel->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.personnel.create');
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
            'phone'=>'required|min:9',

        );
        $this->validate($request,$rules);

        $data = request()->except(['_token','_method']);
        if(isset($data['skilled'])){

            $data['skilled']=true;

        }else{
            $data['skilled']=false;
        }
        $data['added_by']=auth()->user()->name;
        Personel::create($data);

        return redirect()->route('personels.index')->withStatus(__('Personnel successfully created.'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Personel  $personel
     * @return \Illuminate\Http\Response
     */
    public function show(Personel $personel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personel  $personel
     * @return \Illuminate\Http\Response
     */
    public function edit(Personel $personel)
    {
        return view('modules.personnel.update',compact('personel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personel  $personel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personel $personel)
    {
        $rules =array(
            'name'=>'required|min:3',
            'phone'=>'required:min:9',

        );
        $this->validate($request,$rules);

        $data = request()->except(['_token','_method']);
        if(isset($data['skilled'])){

            $data['skilled']=true;

        }else{
            $data['skilled']=false;
        }
        $data['added_by']=auth()->user()->name;
        Personel::whereId($personel->id)->update($data);
        return redirect()->route('personels.index')->withStatus(__('Personnel successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personel  $personel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personel $personel)
    {
        $personel->delete();

        return redirect()->route('personels.index')->withStatus(__('Personnel successfully deleted.'));
    }
}
