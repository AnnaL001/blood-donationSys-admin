<?php

namespace App\Http\Controllers\Admin;

use App\Donor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Pass data to view
        return view('admin.donor')->with( 'donors',Donor::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.donor_create');
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
            'first_name'=>'required',
            'last_name'=>'required',
            'surname' => 'required',
            'email'=>'required',
            'password' => 'required',
            'phoneNo' => 'required'

        ]);

        $donors = new Donor([
            'first_name' =>  $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'surname' => $request->get('surname'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'phoneNo'=> $request->get('phoneNo'),
            'gender' => $request->get('gender'),
            'blood_type' => $request->get('blood_type'),

        ]);

        $donors->save();
        return redirect()->route('admin.donors.index')->with('success','Donor info has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donors = Donor::findOrFail($id);
        return view('admin.donor_profile', compact('donors'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $donors = Donor::find($id);
        return view('admin.donor_edit', compact('donors'));
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
            'first_name'=>'required',
            'last_name'=>'required',
            'surname' => 'required',
            'email'=>'required',
            'password' => 'required',
            'phoneNo' => 'required',
            'gender' => 'required',
            'blood_type' => 'required'

        ]);

        $donors = Donor::find($id);
        $donors->first_name =  $request->get('first_name');
        $donors->last_name = $request->get('last_name');
        $donors->surname = $request->get('surname');
        $donors->email = $request->get('email');
        $donors->password = bcrypt($request->get('password'));
        $donors->phoneNo= $request->get('phoneNo');
        $donors->gender = $request->get('gender');
        $donors->blood_type = $request->get('blood_type');

        $donors->save();

        return redirect()->route('admin.donors.index')->with('success','Donor info has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Donor::destroy($id);
        return redirect()->route('admin.donors.index')->with('success','Admin info has been deleted');
    }
}
