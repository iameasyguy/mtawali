<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Authorizable;
class ClientController extends Controller
{
    use Authorizable;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Client $model)
    {
       return view('modules.clients.index',['clients' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $counties = DB::table('counties')->groupBy('name')
            ->pluck('name','id');
        return view('modules.clients.create',compact('counties'));
//        return $counties;



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
            'email'=>'required|email',
            'contact_person'=>'required|min:6',
            'phone'=>'required',
            'county'=>'required|min:3',
            'sub_county'=>'required|min:3',
            'area'=>'required|min:10'

        );
        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails())
        {
            return response()->json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()

            ), 400); // 400 being the HTTP code for an invalid request.
        }
        $data = request()->except(['_token','_method']);
        $data['username']=auth()->user()->name;
        Client::create($data);

        return response()->json(array('success' => true,'message' => 'Client added'), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $counties = DB::table('counties')->groupBy('name')
            ->pluck('name','id');
        return view('modules.clients.update',compact('client','counties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $rules =array(
            'name'=>'required|min:3',
            'email'=>'required|email',
            'contact_person'=>'required|min:6',
            'phone'=>'required',
            'county'=>'required|min:3',
            'sub_county'=>'required|min:3',
            'area'=>'required|min:10'

        );


        $this->validate($request,$rules);




        $data = request()->except(['_token','_method']);
        $data['username']=auth()->user()->name;
        Client::whereId($client->id)->update($data);
        return redirect()->route('clients.index')->withStatus(__('Client successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->withStatus(__('Client successfully deleted.'));
    }

    public function getcounty($county){
        $sub_county = DB::table('counties')->where('name',$county)->pluck("sub_counties","sub_counties");;
        return json_encode($sub_county);
    }
}
