<?php

namespace App\Http\Controllers\Super_admin;

use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Pass data to view
        return view('super_admin.branch')->with( 'branches',Branch::paginate(3));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('super_admin.branch_create');
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
            'branch_name'=>'required',
            'branch_type' => 'required',
            'branch_location'=>'required'
        ]);

        $branches = new Branch([
            'branch_name' =>  $request->get('branch_name'),
            'branch_type' => $request->get('branch_type'),
            'branch_location' => $request->get('branch_location'),

        ]);

        $branches->save();
        return redirect()->route('super_admin.branches.index')->with('success','Branch info has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branches = Branch::find($id);
        return view('super_admin.branch_edit', compact('branches'));
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
            'branch_name'=>'required',
            'branch_type' => 'required',
            'branch_location'=>'required'
        ]);

        $branches = Branch::find($id);
        $branches -> branch_name =  $request->get('branch_name');
        $branches -> branch_type = $request -> get('branch_type');
        $branches -> branch_location = $request -> get('branch_location');

        $branches->save();
        return redirect()->route('super_admin.branches.index')->with('success','Branch info has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Branch::destroy($id);
        return redirect()->route('super_admin.branches.index')->with('success','Branch info has been deleted');
    }
}
