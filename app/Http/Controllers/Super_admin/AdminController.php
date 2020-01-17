<?php

namespace App\Http\Controllers\Super_admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Pass data to view
        return view('super_admin.admin')->with( 'admins',User::paginate(4));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super_admin.admin_create');
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
            'fname'=>'required',
            'lname'=>'required',
            'sname' => 'required',
            'email'=>'required',
            'phoneNo' => 'required',
            'password' => 'required'
        ]);


        $admins = new User([
            'fname' =>  $request->get('fname'),
        'lname' => $request->get('lname'),
        'sname' => $request->get('sname'),
        'email' => $request->get('email'),
        'phoneNo'=> $request->get('phoneNo'),
        'password' => bcrypt($request->get('password')),
        'gender' => $request->get('gender'),
        'branch_id' => $request->get('branch_id')

        ]);

        $admins->save();
        return redirect()->route('super_admin.admins.index')->with('success','Admin info has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profiles = User::findOrFail($id);
        return view('super_admin.admin_profile', compact('profiles'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->id == $id){
            return redirect()->route('super_admin.admins.index')->with('warning', 'You are not allowed to edit yourself');
        }
        $admins = User::findOrFail($id);
        return view('super_admin.admin_edit', compact('admins'));
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
        if(Auth::user()->id == $id){
            return redirect()->route('super_admin.admins.index')->with('warning', 'You are not allowed to edit yourself');
        }
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'sname' => 'required',
            'email'=>'required',
            'phoneNo' => 'required',
            'password' => 'required',
        ]);

        $admins = User::find($id);
        $admins->fname =  $request->get('fname');
        $admins->lname = $request->get('lname');
        $admins->sname = $request->get('sname');
        $admins->email = $request->get('email');
        $admins->phoneNo= $request->get('phoneNo');
        $admins->password = bcrypt($request->get('password'));
        $admins->gender = $request->get('gender');
        $admins->branch_id = $request->get('branch_id');

        $admins->save();

        return redirect()->route('super_admin.admins.index')->with('success','Admin info has been updated');
}



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('super_admin.admins.index')->with('success','Admin info has been deleted');
    }
}
