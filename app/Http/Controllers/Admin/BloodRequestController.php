<?php

namespace App\Http\Controllers\Admin;

use App\Blood_request;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BloodRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Pass data to view
        return view('admin.blood_request')->with( 'requests',Blood_request::paginate(2));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.request_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'request_text'=>'required',
            'blood_type' => 'required',
            'branch'=>'required',
        ]);

        $requests= new Blood_request([
            'request_text' =>  $request->get('request_text'),
            'blood_type' => $request->get('blood_type'),
            'branch_id' => $request->get('branch')

        ]);

        $requests->save();
        return redirect()->route('admin.requests.index')->with('success','Request has been sent and recorded');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requests = Blood_request::findOrFail($id);
        return view('admin.request_edit', compact('requests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'request_text'=>'required',
            'blood_type' => 'required',
            'branch'=>'required',
        ]);

        $requests = Blood_request::find($id);
        $requests->request_text =  $request->get('request_text');
        $requests->blood_type_id = $request->get('blood_type');
        $requests->branch_id = $request->get('branch');

        $requests->save();

        return redirect()->route('admin.requests.index')->with('success','Request has been updated');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Blood_request::destroy($id);
        return redirect()->route('admin.requests.index')->with('success','Request has been deleted');
    }
}
