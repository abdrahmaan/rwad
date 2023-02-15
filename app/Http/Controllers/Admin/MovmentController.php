<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;

use App\Models\Player;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class MovmentController extends Controller
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

        $Groups = Group::all();
        $Branches = Branch::all();

        $passData = ["Groups"=>$Groups,"Branches"=>$Branches];
        
        
        return view('admin.movment.create', $passData);
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
            'StartCounter'=>'required|regex:/[0-9]/|numeric|min:1',
            'EndCounter'=>'required|regex:/[0-9]/|numeric|min:1',
            'Diff'=>'required|regex:/[0-9]/|numeric|min:1',
            'BranchName' => 'required'
        ],
        [
            'Tabashery.required'=>'حقل الطباشيري مطلوب',
            'PlateNumber.required'=>'حقل اللوحة مطلوب',
            'CarType.required'=>'حقل نوع السيارة مطلوب',
            'StartCounter.required'=>'حقل عداد الخروج مطلوب',
            'StartCounter.min'=>'حقل عداد الخروج يجب أن يكون عدد صحيح',
            'EndCounter.required'=>'حقل عداد الدخول مطلوب',
            'EndCounter.min'=>'حقل عداد الدخول يجب أن يكون عدد صحيح',
            'Diff.required'=>'حقل فرق العداد مطلوب',
            'Diff.min'=>'حقل فرق العداد يجب أن يكون عدد صحيح',


        ]);


    //    $insert = Group::create([
    //         'GroupName'=> $request->GroupName,
    //         'Day' => $request->Day,
    //         'Time' => $Time,
    //         'BranchName' => $request->BranchName
    //     ]);

        // $insert->save();
        
        return redirect("/admin/movments/create")->with("message","تم تسجيل الحركة بنجاح");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $data = Group::where("id",$id)->first();
        $Branches = Branch::all();
        
        return view('admin.group.edit',["Group"=>$data,"Branches"=>$Branches]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $request->validate([
            'GroupName'=>'required|regex:/[ء-ي]/',
            'Day' => 'required',
            'Time' => 'required',
            'BranchName' => 'required|min:0'
        ],
        [
            'GroupName.required' => 'من فضلك أدخل أسم المجموعة',
            'GroupName.unique' => 'إسم المجموعة مسجل من قبل',
            'GroupName.regex' => 'من فضلك أكتب باللغة العربية',
            'Day.required' => 'من فضلك إختار اليوم',
            'Time.required' => 'من فضلك إدخل الوقت',
            'BranchName.required' => 'من فضلك إدخل الفرع',
            'BranchName.min' => 'من فضلك إدخل الفرع',

        ]);
       
        $time = $request->Time;


        $Hour = explode(":",strval($time))[0];
        $Min = explode(":",strval($time))[1];
        $newHour;
        $stat; 

        if($Hour == "00"){

            $newHour = "12";
            $stat = "صباحاً";

        } elseif($Hour == "12"){
            $newHour = "12";
            $stat = "مساء";
            
        } elseif ($Hour > 12){
            $newHour = intval($Hour) - 12;
            $stat = "مساء";
            
        } elseif ($Hour < 12) {
            $newHour = $Hour;
            $stat = "صباحاً";

        }

        

       $Time =  "$newHour:$Min $stat";


       $UpdateGroup = Group::where('id',$id)->update([
            'GroupName'=> $request->GroupName,
            'Day' => $request->Day,
            'Time' => $Time,
            'BranchName' => $request->BranchName
        ]);

        $newGroupName = "$request->GroupName - $request->Day - $Time";

       $UpdatePlayers = Player::where('GroupName',$request->OldName)->update([
            'GroupName'=> $newGroupName,
        ]);

        
        return redirect("/admin/groups/create")->with("message","تم تعديل المجموعة بنجاح");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Group::where('id',$id)->delete();

        return redirect("/admin/groups/create")->with("message","تم حذف المجموعة بنجاح");
    }
}
