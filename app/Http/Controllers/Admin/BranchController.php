<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = Branch::all();

        return view("admin.branch.create")->with('Branches', $data);
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
            'BranchName' => 'required|regex:/[ء-ي]/|unique:branches,BranchName'
        ],[
            'BranchName.required'=>'من فضلك أدخل إسم الفرع',
            'BranchName.regex'=>'من فضلك أدخل إسم الفرع باللغة العربية',
            'BranchName.unique'=>'إسم الفرع مسجل من قبل'
        ]);

       $insert =  Branch::create([
            'BranchName'=> $request->BranchName
        ]);
        
        $insert->save();
        
        return redirect('/admin/branches/create')->with("message","تم إضافة الفرع بنجاح");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
       $delete = Branch::where("id", $id)->delete();

        session()->flash("message","تم حذف الفرع بنجاح");
        return redirect('/admin/branches/create');
    }
}
