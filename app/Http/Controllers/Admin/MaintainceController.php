<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Payout;
use App\Models\Branch;
use Illuminate\Http\Request;

class MaintainceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branchs = Branch::all();

        return view('admin.payout.index' , ["Branches"=>$branchs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $branchs = Branch::all();

        session()->flash("error","لا يوجد قطع غيار فى المخزن من الصنف المحدد");

        return view('admin.maintaince.create' , ["Branches"=>$branchs]);
        
    }



     public function  getAllPayouts()
    {
            $data = Payout::all();
            $response = response()->json($data);

            return $response;
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
            'Tabashery'=>'required',
            'PlateNumber'=>'required',
            'CarType'=>'required',
            'Counter'=>'required|regex:/[0-9]/|numeric|min:1',
            'CategName'=>'required',
            'GroupName'=>'required',
            'Count' => 'required|numeric|min:1',
            'BranchName' => 'required'
        ],
        [
            'Tabashery.required'=>'حقل الطباشيري مطلوب',
            'PlateNumber.required'  =>'حقل لوحة السيارة مطلوب',
            'CarType.required'=>'حقل نوع السيارة مطلوب',
            'Counter.required'=>'حقل عداد السيارة مطلوب',
            'Counter.min'=>'حقل عداد السيارة يجب أن يكون عدد صحيح',
            'CategName.required'=>'حقل التصنيف مطلوب',
            'GroupName.required'=>'حقل نوع الغيار مطلوب',
            'Count.required'=>'حقل عدد قطع الغيار مطلوب',
            'Count.min'=>'حقل عدد قطع يجب أن يكون عدد صحيح',
            'BranchName.required'=>'حقل الفرع مطلوب',


        ]);


            //  $insert =  Payout::create([
            //     'Desc' => $request->Desc,
            //     'Type' => $request->Type,
            //     'Amount'=> $request->Amount,
            //     'Branch' => $request->Branch,
            //     'User' => $request->session()->get('user-data')->FullName,

            //     ]);
            //     $insert->save();
                session()->flash("message","تم تسجيل الصيانة بنجاح");
                return redirect("/admin/maintainces/create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payout  $payout
     * @return \Illuminate\Http\Response
     */
    public function show(Payout $payout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payout  $payout
     * @return \Illuminate\Http\Response
     */
    public function edit(Payout $payout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payout  $payout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payout $payout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payout  $payout
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Payout::where("id",$id)->delete();

        session()->flash("message","تم حذف المصروف بنجاح");
        return redirect("/admin/payouts");
    }
}
