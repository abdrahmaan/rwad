<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Payment;
use App\Models\Branch;
use App\Models\Group;
use App\Models\Player;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();
        $branchs = Branch::all();

         return view('admin.payment.index', ["Branches"=>$branchs,"Groups"=>$groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('admin.inventory.create');

    }


    public function getAllPayements(){

        $data = Payment::all();

        $response = response()->json($data);

        return $response;
        // return "hello";
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
            'Count'=>'required|numeric|min:1'
        ],[
            'Count.required' => 'حقل عدد قطع الغيار مطلوب',
            'Count.min' => 'حقل عدد قطع الغيار يجب ان يكون عدد صحيح'
        ]);


        // $insert = Payment::create([
        //     'PlayerCode'=> $request->PlayerCode,
        //     'PlayerName'=> $request->PlayerName,
        //     'Amount'=> $request->Amount,
        //     'GroupName'=> $request->GroupName,
        //     'Branch'=> $request->BranchName,
        //     'User'=> session()->get('user-data')->FullName ,
        // ]);
        
        session()->flash("message","تم تسجيل الصنف بنجاح");
        return redirect('/admin/inventory/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $deletePayment = Payment::where("id",$id)->delete();
        
        session()->flash("message","تم حذف دفع الإشتراك");

        return redirect("/admin/payments");

    }
}
