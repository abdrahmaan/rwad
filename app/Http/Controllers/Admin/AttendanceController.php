<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;

use App\Models\Branch;
use App\Models\Player;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\AttendanceCaptin;
use App\Http\Controllers\Controller;

class AttendanceController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Groups = Group::all();
        $Branches = Branch::all();

        return view('admin.attendance.index',["Groups" => $Groups,"Branches" => $Branches]);
   
    }


    public function getAllAttendance()
    {   
       $data = Attendance::all();
       $response = array(); 
       $response["status"] = 1;
       $response["data"] = $data;

       return response()->json($data);

    }   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $players = Player::all();
        $Groups = Group::all();
        $Branches = Branch::all();
       



        return view('admin.attendance.create',["players"=>$players,"Groups" => $Groups,"Branches" => $Branches]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $GroupName = $request->GroupName;
        $Names = json_decode($request->PlayerNames);

        if(session()->get('user-data')->Role == "Captin"){

          $CaptinAttendance_Today = AttendanceCaptin::whereDate('created_at', Carbon::today())->where('GroupName',$GroupName)->get()->toArray();

            if(empty($CaptinAttendance_Today)){
                AttendanceCaptin::create([
                    'CaptinName' => session()->get('user-data')->FullName,
                    'GroupName' => $GroupName,
                    'BranchName' => $Names[0]->branchname
                ]);
            }       
          

        }

        foreach ($Names as $Name) {

            Attendance::create([
                'PlayerCode' => $Name->id,
                'PlayerName' =>  $Name->playername,
                "GroupName" => $GroupName,
                "BranchName"=> $Name->branchname,
                "Type" => "حضور",
                'Moderator' => session()->get('user-data')->FullName
            ]);

        }

        session()->flash("message","تم تسجيل الحضور");
        return redirect('/admin/attendances/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(attendance $attendance)
    {
        //
    }


    public function getAllCaptinAttendance()
    {
        
       
        $attendance = AttendanceCaptin::all();

        $data = [];

        $data["status"] = 1;
        $data["data"] = $attendance;

        return response()->json($data);

   
    }


    public function captinView()
    {
       
        $Groups = Group::all();
        $Branches = Branch::all();
        return view('admin.attendance.captin',["Groups" => $Groups,"Branches" => $Branches]);
        // return "hello";
   
    }
    

    public function captinDelete($id)
    {
        AttendanceCaptin::where("id",$id)->delete();

         session()->flash("message","تم حذف حضور الكابتن");

        return redirect('/admin/attendance/captin');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $delete = Attendance::where("id",$id)->delete();
       session()->flash("message","تم حذف الحضور");
      return redirect("/admin/attendances");
    }


  

}
