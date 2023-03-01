<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use App\Models\Car;
use App\Models\CarMovment;
use Illuminate\Http\Request;
use App\Exports\ExportMovment;
use Maatwebsite\Excel\Facades\Excel;
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

        $Bracnhes = Branch::all();

        return view("admin.movment.index",["Branches"=>$Bracnhes]);
    }
    
    
    
    public function search(Request $request){

        $request->validate([
            "StartDate"=> "required",
            "EndDate"=> "required"
        ],[
            "StartDate.required"=>"تاريخ البداية مطلوب",
            "EndDate.required"=>"تاريخ النهارية مطلوب"
        ]);
        
        $Tabashery = $request->Tabashery;
        $CarType = $request->CarType;
        $BranchName = $request->BranchName;
        $StartDate = $request->StartDate;
        $EndDate = $request->EndDate;

        $Data = array();

        $Branches = Branch::all();
        $Movments = CarMovment::orderBy("created_at", "desc")->get();

        foreach($Movments as $Movment){

            if(explode(" ",$Movment->created_at)[0] >= $StartDate && explode(" ",$Movment->created_at)[0] <= $EndDate){
            
            $TabasheryFilter = false;
            $CarTypeFilter = false;
            $BranchFilter = false;
    
            if($BranchName == "الكل"){
                $BranchFilter = true;
             } else {
                if($BranchName == $Movment->BranchName){
                    $BranchFilter = true;
                } else {
                    $BranchFilter == false;
                }
            }
            
            if($CarType == "الكل"){
                $CarTypeFilter = true;
             } else {
                if($CarType == $Movment->CarType){
                    $CarTypeFilter = true;
                } else {
                    $CarTypeFilter == false;
                }
            }


            if($Tabashery == ""){
                $TabasheryFilter = true;
             } else {
                if($Tabashery == $Movment->Tabashery || $Tabashery == $Movment->PlateNumber ){
                    $TabasheryFilter = true;
                } else {
                    $TabasheryFilter == false;
                }
            }


           if($BranchFilter && $CarTypeFilter && $TabasheryFilter){
                 $Data[] = $Movment;
           }

            }
        }

        if(isset($request->Export)){

            session()->put('data-export',$Data);

            return Excel::download(new ExportMovment, "تحركات عربية $Tabashery من $StartDate - $EndDate.xlsx");

        } else {
            
            return view("admin.movment.index",["Branches"=>$Branches, "Movments" => $Data]);
            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $Branches = Branch::all();

        $passData = ["Branches"=>$Branches];
        
        
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

        // New Movment Insert 
        CarMovment::create([
            'Tabashery'=> $request->Tabashery,
            'PlateNumber'=> $request->PlateNumber,
            'CarType'=> $request->CarType,
            'StartCounter'=> $request->StartCounter,
            'EndCounter'=> $request->EndCounter,
            'Diff'=> $request->Diff,
            'BranchName' =>  $request->BranchName,
            'op' =>  session()->get("user-data")->FullName,
        ]);

        // Set Car Counter With Last Counter
        Car::where("Tabashery",$request->Tabashery)->update([
            "SCounter" => $request->EndCounter
        ]);
        
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

        $Movment = CarMovment::where("id",$id)->get()->first();
        
        $Branches = Branch::all();

        $passData = ["Branches"=>$Branches, "Movment" => $Movment]; 

        $MovmentEnd = $Movment->EndCounter;
        $BiggestMovmentEndForCar = CarMovment::where("Tabashery", $Movment->Tabashery)->max("EndCounter");

        if($MovmentEnd == $BiggestMovmentEndForCar){

            return view('admin.movment.edit', $passData);
            
        } else {
            
            session()->flash("error","لا يمكن التعديل غير على أخر عداد مسجل للسيارة فقط");
            return redirect("/admin/movments");

        }
  
        
        
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

        $MovmentEndCounter = $request->EndCounter;



            Car::where("Tabashery",$request->Tabashery)->update([
                "SCounter" => $MovmentEndCounter
            ]);


            CarMovment::where("id",$id)->update([
                "EndCounter" => $MovmentEndCounter,
                "Diff" => $request->Diff
            ]);

            
            session()->flash("message","تم تعديل الحركة بنجاح");
            return redirect("/admin/movments");
            
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $MovmentDelete = CarMovment::where("id",$id)->get()->first();

            $StartCounter = $MovmentDelete->StartCounter;
            
            $checkStarts = CarMovment::where("Tabashery",$MovmentDelete->Tabashery)->where("StartCounter",">",$StartCounter)->get()->first();
        
            if(!is_null($checkStarts)){

                session()->flash("error","لا يمكن حذف الحركة ، يجب حذف العدادات السابقة أولاً");

               return redirect("admin/movments"); 
               
            } else {

                Car::where("Tabashery", $MovmentDelete->Tabashery)->update([
                    "SCounter" => $MovmentDelete->StartCounter
                ]);

                CarMovment::where("id", $id)->delete();
                
                session()->flash("message","تم حذف الحركة بنجاح");
 
               return redirect("admin/movments"); 
            }
    }
}
