<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Branch;

use Illuminate\Http\Request;

class SollarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Bracnhes = Branch::all();
        return view('admin.sollar.index', ["Branches" => $Bracnhes] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        return view('admin.sollar.create' );

    }
    public function new(Request $request)
    {
        $id = $request->id;

        $Player = Player::select('id','PlayerName')->where('id',$id)->get()->first();

        return view('admin.skill.create', ["Player"=> $Player] );

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
            'Tabashery'=>'required|regex:/[0-9]/',
            'PlateNumber'=>'required',
            'CarType'=>'required',
            'Counter'=>'required|regex:/[0-9]/|numeric|min:1',
            'Liter'=>'required|regex:/[0-9]/|numeric|min:1',
            'CostLiter'=>'required|regex:/[0-9]/|numeric|min:1',
            'Total' => 'required|numeric|min:1',
            'BranchName' => 'required'
        ],
        [
            'Tabashery.required'=>'حقل الطباشيري مطلوب',
            'PlateName.required'=>'حقل اللوحة مطلوب',
            'CarType.required'=>'حقل نوع السيارة مطلوب',
            'Counter.required'=>'حقل عداد السيارة مطلوب',
            'Counter.min'=>'حقل عداد السيارة يجب أن يكون عدد صحيح',
            'Liter.required'=>'حقل عدد الليترات مطلوب',
            'Liter.min'=>'حقل عداد الليترات يجب أن يكون عدد صحيح',
            'CostLiter.required'=>'حقل سعر الليتر مطلوب',
            'CostLiter.min'=>'حقل سعر الليتر يجب أن يكون عدد صحيح',
            'Total.required'=>' حقل الإجمالى مطلوب',
            'Total.min'=>'حقل الإجمالى يجب أن يكون عدد صحيح مطلوب',
            'BranchName.required'=>'حقل الفرع مطلوب',


        ]);

    //   $add = Skill::create($request->all());
    //   $add->save();
      $request->session()->flash("message","تم تسجيل السولار بنجاح");
      return redirect("/admin/sollars/create");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     
        
        return view("admin.skill.edit",["id"=>$id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Skill::where("id",$id)->delete();

        session()->flash("message","تم حذف التقييم بنجاح");
        return redirect("/admin/players");
    }
}
