<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Payout;
use App\Models\Branch;
use App\Models\Car;
use App\Models\CarType;
use App\Models\Maintaince;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MaintainceController extends Controller
{




    // My Functions Start
        public function search(Request $request){

            
            $request->validate([
                'StartDate'=>'required',
                'EndDate'=>'required',
                'CarType'=>'required',
                'BranchName' => 'required'
            ],
            [
                'CarType.required'=>'حقل نوع السيارة مطلوب',
                'BranchName.required'=>'حقل الفرع مطلوب',
                'StartDate.required'=>'حقل تاريخ البدارية مطلوب',
                'EndDate.required'=>'حقل تاريخ النهاية مطلوب',
    
    
            ]);

            $Branches = Branch::all();
             $CarTypes = CarType::all();
            // Filter Data
            $SDate = $request->StartDate;
            $EDate = $request->EndDate;
            $Tabashery = $request->Tabashery;
            $BranchName = $request->BranchName;
            $CarType = $request->CarType;
            $Export = $request->Export;

            // Filter Boolen
            $TabasheryFilter = false;
            $CarTypeFilter = false;
            $BranchFilter = false;
            $MaintainceFilter = false;

            

          $Data =  Maintaince::whereDate("created_at" ,">=", $SDate)
                            ->whereDate("created_at","<=" ,$EDate)
                            ->orderBy("created_at", "desc")
                            ->get();

            $FilteredData = [];

            for ($i=0; $i < count($Data) ; $i++) { 
               if($Tabashery == "" || $Tabashery == Null){
                    $TabasheryFilter = true;
                } else {
                        if($Data[$i]->Tabashery == $Tabashery){
                            $TabasheryFilter = true;
                            } else {
                            $TabasheryFilter = false;
                        }
                }
            
            
               if($CarType == "الكل"){
                     $CarTypeFilter = true;
                  } else {
                    if($Data[$i]->CarType == $CarType){
                        $CarTypeFilter = true;
                        } else {

                        $CarTypeFilter = false;

                    }
                  }
               if($BranchName == "الكل"){
                        $BranchFilter = true;
                } else {
                    if($Data[$i]->BranchName == $BranchName){
                        $BranchFilter = true;
                        } else {
                        $BranchFilter = false;
                    }
                }
            
                if($BranchFilter && $TabasheryFilter && $CarTypeFilter){

                    $FilteredData[] = $Data[$i];

                }
    
            }  

            if(isset($request->Export)){

                if(count($FilteredData) > 0){

                    session()->put('data-export',$FilteredData);
                    
                    return Excel::download(new ExportMovment, "تحركات عربية $Tabashery من $StartDate - $EndDate.xlsx");
        
                    
                } else {
                    
                    session()->flash('error',"لا يوجد بيانات للإستخراج");
                    return redirect("/admin/maintainces")->with(["Branches"=>$Branches , "CarTypes" => $CarTypes]);
                }
                
            } else {
                
                return view("admin.maintaince.index",["Branches"=>$Branches , "CarTypes" => $CarTypes, "Data"=> $FilteredData]);
                // return dd($FilteredData);
            }
         
            // return dd($FilteredData);
   


        }
    // My Functions End
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Branches = Branch::all();
        $CarTypes = CarType::all();

        return view('admin.maintaince.index' , ["Branches"=>$Branches , "CarTypes" => $CarTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $branchs = Branch::all();

        return view('admin.maintaince.create' , ["Branches"=>$branchs]);
        
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
            // 'GroupName'=>'required',
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
            // 'GroupName.required'=>'حقل نوع الغيار مطلوب',
            'Count.required'=>'حقل عدد قطع الغيار مطلوب',
            'Count.min'=>'حقل عدد قطع يجب أن يكون عدد صحيح',
            'BranchName.required'=>'حقل الفرع مطلوب',


        ]);


       $CarData =  Car::where("Tabashery",$request->Tabashery)->first();

        //    return dd($CarData);

        switch ($request->CategName) {
            case 'زيت':
                        Maintaince::create([
                    "Tabashery" => $request->Tabashery,
                    "PlateNumber" => $request->PlateNumber,
                    "CarType" => $request->CarType,
                    "Counter" => $request->Counter,
                    "Desc" => $request->Desc == Null ? "لا يوجد" : $request->Desc ,
                    "CategName" => $request->CategName,
                    "BranchName" => $request->BranchName,
                    "Count" => $request->Count,
                    "LastNextCounter" => $CarData->NextZet,
                    "CarImg" => $CarData->CarImg,
                    "op" => session()->get("user-data")->FullName,
                ]);

             break;
            case 'فلتر زيت':
                  Maintaince::create([
                        "Tabashery" => $request->Tabashery,
                        "PlateNumber" => $request->PlateNumber,
                        "CarType" => $request->CarType,
                        "Counter" => $request->Counter,
                        "Desc" => $request->Desc == Null ? "لا يوجد" : $request->Desc ,
                        "CategName" => $request->CategName,
                        "BranchName" => $request->BranchName,
                        "Count" => $request->Count,
                        "LastNextCounter" => $CarData->NextFilterZ,
                        "CarImg" => $CarData->CarImg,
                        "op" => session()->get("user-data")->FullName,
                    ]);

            break;
            case 'فلتر هواء':
                  Maintaince::create([
                        "Tabashery" => $request->Tabashery,
                        "PlateNumber" => $request->PlateNumber,
                        "CarType" => $request->CarType,
                        "Counter" => $request->Counter,
                        "Desc" => $request->Desc == Null ? "لا يوجد" : $request->Desc ,
                        "CategName" => $request->CategName,
                        "BranchName" => $request->BranchName,
                        "Count" => $request->Count,
                        "LastNextCounter" => $CarData->NextFilterH,
                        "CarImg" => $CarData->NextFilterH,
                        "op" => session()->get("user-data")->FullName,
                    ]);

            break;
            case 'سيور':
                        Maintaince::create([
                    "Tabashery" => $request->Tabashery,
                    "PlateNumber" => $request->PlateNumber,
                    "CarType" => $request->CarType,
                    "Counter" => $request->Counter,
                    "Desc" => $request->Desc == Null ? "لا يوجد" : $request->Desc ,
                    "CategName" => $request->CategName,
                    "BranchName" => $request->BranchName,
                    "Count" => $request->Count,
                    "LastNextCounter" => $CarData->NextSior,
                    "CarImg" => $CarData->CarImg,
                    "op" => session()->get("user-data")->FullName,
                ]);

             break;
            case 'كاوتش':
                    Maintaince::create([
                "Tabashery" => $request->Tabashery,
                "PlateNumber" => $request->PlateNumber,
                "CarType" => $request->CarType,
                "Counter" => $request->Counter,
                "Desc" => $request->Desc == Null ? "لا يوجد" : $request->Desc ,
                "CategName" => $request->CategName,
                "BranchName" => $request->BranchName,
                "Count" => $request->Count,
                "LastNextCounter" => $CarData->NextKawtsh,
                "CarImg" => $CarData->CarImg,
                "op" => session()->get("user-data")->FullName,
                 ]);

            break;
            case 'تيل فرامل':
                        Maintaince::create([
                    "Tabashery" => $request->Tabashery,
                    "PlateNumber" => $request->PlateNumber,
                    "CarType" => $request->CarType,
                    "Counter" => $request->Counter,
                    "Desc" => $request->Desc == Null ? "لا يوجد" : $request->Desc ,
                    "CategName" => $request->CategName,
                    "BranchName" => $request->BranchName,
                    "Count" => $request->Count,
                    "LastNextCounter" => $CarData->NextFramel,
                    "CarImg" => $CarData->CarImg,
                    "op" => session()->get("user-data")->FullName,
                ]);

            break;

            default:
                  Maintaince::create([
                        "Tabashery" => $request->Tabashery,
                        "PlateNumber" => $request->PlateNumber,
                        "CarType" => $request->CarType,
                        "Counter" => $request->Counter,
                        "Desc" => $request->Desc == Null ? "لا يوجد" : $request->Desc ,
                        "CategName" => $request->CategName,
                        "BranchName" => $request->BranchName,
                        "Count" => $request->Count,
                        "LastNextCounter" => 0,
                        "CarImg" => $CarData->CarImg,
                        "op" => session()->get("user-data")->FullName,
                    ]);

            break;
        }
   

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
