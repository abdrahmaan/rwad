<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\CarExport;
use Maatwebsite\Excel\Facades\Excel;


use App\Models\Branch;
use App\Models\Car;



class CarController extends Controller
{
 
    public function index(Request $request)
    {

         $Branches = Branch::all();
    
            
          return view('admin.car.index',["Branches" => $Branches]);
    
        
    }
    
    public function search(Request $request){
        

        $Tabashery = $request->Tabashery;
        $CarType = $request->CarType;
        $BranchName = $request->BranchName;

        $Data = array();

        $Branches = Branch::all();
        $Cars = Car::all();


        foreach($Cars as $car) {

            $TabasheryFilter = false;
            $CarTypeFilter = false;
            $BranchFilter = false;
    
            if($BranchName == "الكل"){
                $BranchFilter = true;
             } else {
                if($BranchName == $car->BranchName){
                    $BranchFilter = true;
                } else {
                    $BranchFilter == false;
                }
            }
            
            if($CarType == "الكل"){
                $CarTypeFilter = true;
             } else {
                if($CarType == $car->CarType){
                    $CarTypeFilter = true;
                } else {
                    $CarTypeFilter == false;
                }
            }


            if($Tabashery == ""){
                $TabasheryFilter = true;
             } else {
                if($Tabashery == $car->Tabashery || $Tabashery == $car->PlateNumber ){
                    $TabasheryFilter = true;
                } else {
                    $TabasheryFilter == false;
                }
            }


           if($BranchFilter && $CarTypeFilter && $TabasheryFilter){
                 $Data[] = $car;
           }

        }
        return view('admin.car.index',["Branches" => $Branches, "Cars"=> $Data]);

    }

    public function getAllCars(){

        $Cars = Car::all();
        return response()->json($Cars);

    }
    

    public function export(){

       return Excel::download(new CarExport,"new.xlsx");
    }


    public function create()
    {
        $BranchesName = Branch::all();
        
        $passData = [
            "branches"=>$BranchesName];

        return view("admin.car.create", $passData);
    }

    public function store(Request $request)
    {
        $request->validate([
            "Tabashery" => "required|numeric|unique:cars,Tabashery",
            "PlateNumber" => "required|unique:cars,PlateNumber",
            "CarType" => "required",
            "SCounter" => "required|numeric|min:0",
            "BranchName" => "required",
        ],[
            "Tabashery.required" => "حقل الطباشيري مطلوب",
            "Tabashery.numeric" => "حقل الطباشيري يجب أن يكون رقم",
            "Tabashery.unique" => "يوجد سيارة من قبل بنفس رقم طباشيري",
            "PlateNumber.required" => "حقل لوحة السيارة مطلوب",
            "PlateNumber.unique" => "لوحة السيارة مسجلة من قبل",
            "CarType.required" => "حقل نوع السيارة مطلوب",
            "SCounter.required" => "حقل عداد البداية مطلوب",
            "SCounter.numeric" => "حقل عداد البداية يجب أن يكون رقم صحيح",
            "SCounter.min" => "حقل عداد البداية يجب أن يكون رقم صحيح",
            "BranchName.required" => "حقل الفرع مطلوب",
        ]);


            $insert = Car::create([
                "Tabashery" => $request->Tabashery,
                "PlateNumber" => $request->PlateNumber,
                "CarType" => $request->CarType,
                "SCounter" => $request->SCounter,
                "BranchName" => $request->BranchName,
            ]);


        return redirect("/admin/cars/create")->with("message","تم إضافة السيارة بنجاح");
        

        

    }

    
    public function show($id)
    {


        $PlayerData = Player::where("id",$id)->get()->first();
        $PlayerSkill = Skill::where("PlayerCode",$id)->get()->all();

        $passData = [
            'Player' =>$PlayerData,
            "Skills"=> $PlayerSkill
        ];

        return view("admin.player.show")->with('data',$passData);

    }

    public function edit($id) 
    {
        $BranchesName = Branch::all();
        
       

        $Car = Car::where("id",$id)->get()->first();

        $passData = [
            "Branches"=>$BranchesName,
            "Car" => $Car
        ];

        return view("admin.car.edit", ['branches'=> $BranchesName, "Car"=> $Car]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "Tabashery" => "required|numeric",
            "PlateNumber" => "required",
            "CarType" => "required",
            "SCounter" => "required|numeric|min:0",
            "BranchName" => "required",
        ],[
            "Tabashery.required" => "حقل الطباشيري مطلوب",
            "PlateNumber.required" => "حقل لوحة السيارة مطلوب",
            "CarType.required" => "حقل نوع السيارة مطلوب",
            "SCounter.required" => "حقل عداد البداية مطلوب",
            "SCounter.numeric" => "حقل عداد البداية يجب أن يكون رقم صحيح",
            "SCounter.min" => "حقل عداد البداية يجب أن يكون رقم صحيح",
            "BranchName.required" => "حقل الفرع مطلوب",
        ]);


            $insert = Car::where("id",$id)->update([
                "Tabashery" => $request->Tabashery,
                "PlateNumber" => $request->PlateNumber,
                "CarType" => $request->CarType,
                "SCounter" => $request->SCounter,
                "BranchName" => $request->BranchName,
            ]);


        return redirect("/admin/cars")->with("message","تم تعديل السيارة بنجاح");
        
    }


    public function destroy($id)
    {

        Car::where("id",$id)->delete();

        session()->flash("message","تم حذف السيارة بنجاح");
        return redirect("/admin/cars");
    }
}
