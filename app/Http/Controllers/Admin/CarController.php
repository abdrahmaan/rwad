<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Player;
use App\Models\Skill;
use App\Models\Group;
use App\Models\SiteData;
use App\Models\Branch;

use Illuminate\Http\Request;


class CarController extends Controller
{
 
    public function index()
    {

        $players = Player::all();
        $Groups = Group::all();
        $Branches = Branch::all();


        return view('admin.car.index',["players"=>$players,"Groups" => $Groups,"Branches" => $Branches]);
    }


    public function create()
    {
        $GroupsName = Group::all();
        $BranchesName = Branch::all();
        
        $passData = [
            "groups"=> $GroupsName,
            "branches"=>$BranchesName];

        return view("admin.car.create", $passData);
    }

    public function store(Request $request)
    {
        $request->validate([

            "PlayerName" => 'required|regex:/[ء-ي\s]/',
            "Age" => 'required|numeric',
            "Phone" => 'required',
            "Phone2" => 'required',
            "Address" => 'required|regex:/[ء-ي\s]/',
            "DateOfBirth" => 'required',
            "Position" => 'required',
            "Height" => 'required|numeric',
            "Weight" => 'required|numeric',
            "GroupName" => 'required',
            "BranchName" => 'required',
            "CategoryName" => 'required',
            "VideoLink" =>'nullable|regex:/^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$/',
        ],
        [
           
            "PlayerName.required" => 'من فضلك أدخل إسم اللاعب',
            "PlayerName.regex" => 'أدخل إسم اللاعب ثلاثى باللغة العربية',
            "Age.required" => 'من فضلك أدخل السن',
            "Age.numeric" => 'السن بالأرقام فقط',
            "Address.required" => 'من فضلك أدخل العنوان',
            "Address.regex" => 'العنوان باللغة العربية و الأرقام',
            "Phone.required" => 'من فضلك أدخل رقم التيليفون',
            "Phone.regex" => 'من فضلك أدخل رقم تيليفون  لاعب صحيح',
            "Phone2.required" => 'من فضلك أدخل رقم ولى الأمر',
            "Phone2.regex" => 'من فضلك أدخل رقم تيليفون  ولى أمر صحيح',
            "DateOfBirth.required" => 'من فضلك أدخل تاريخ الميلاد',
            "Position.required" => 'من فضلك أدخل المركز',
            "Height.required" => 'من فضلك أدخل الطول',
            "Height.numeric" => 'من فضلك أدخل الطول بالأرقام',
            "Weight.required" => 'من فضلك أدخل الوزن',
            "Weight.numeric" => 'من فضلك أدخل الوزن بالأرقام',
            "GroupName.required" => 'من فضلك أدخل إسم المجموعة',
            "BranchName.required" => 'من فضلك أدخل الفرع',
            "CategoryName.required" => 'من فضلك أدخل لينك فيديو صحيح',
            "VideoLink.regex" =>'من فضلك أدخل لينك فيديو صحيح',
        ]);


      $file =  $request->file('PlayerImage');

      
        if($file !== null){

            $fileName = time() . ".jpg";

            $file->move(public_path('playerimages'),$fileName); 

            Player::create([
                "PlayerName" => $request->PlayerName,
                "Age" => $request->Age,
                "Address" => $request->Address,
                "Phone1" => $request->Phone,
                "Phone2" => $request->Phone2,
                "DateOfBirth" => $request->DateOfBirth,
                "Position" => $request->Position,
                "Height" => $request->Height,
                "Weight" => $request->Weight,
                "GroupName" => $request->GroupName,
                "BranchName" => $request->BranchName,
                "CategoryName" => $request->CategoryName,
                "Status" => "Active",
                "VideoLink" =>$request->VideoLink,
                "ImagePath" =>$fileName,
                "TotalPhy" => 0,
                "TotalAdaKhaty" => 0,
                "TotalMahary" => 0,
                "TotalMentalState" => 0,
                "TotalBrainState" => 0
            ]);




        return redirect("/admin/players/create")->with("message","تم إضافة اللاعب بنجاح");
        } else {

        Player::create([
            "PlayerName" => $request->PlayerName,
            "Age" => $request->Age,
            "Address" => $request->Address,
            "Phone1" => $request->Phone,
            "Phone2" => $request->Phone2,
            "DateOfBirth" => $request->DateOfBirth,
            "Position" => $request->Position,
            "Height" => $request->Height,
            "Weight" => $request->Weight,
            "GroupName" => $request->GroupName,
            "BranchName" => $request->BranchName,
            "CategoryName" => $request->CategoryName,
            "Status" => "Active",
            "VideoLink" =>$request->VideoLink,
            "TotalPhy" => 0,
            "TotalAdaKhaty" => 0,
            "TotalMahary" => 0,
            "TotalMentalState" => 0,
            "TotalBrainState" => 0
        ]);

        return redirect("/admin/players/create")->with("message","تم إضافة اللاعب بنجاح");
        

        }

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
        $GroupsName = Group::all();
        $BranchesName = Branch::all();
        
        $passData = [
            "groups"=> $GroupsName,
            "branches"=>$BranchesName];

        $data = Player::where("id",$id)->get()->first();
        return view("admin.player.edit", ["Player" => $data, 'groups'=> $GroupsName, 'branches'=> $BranchesName]);

    }

    public function update(Request $request, $id)
    {

        $request->validate([

            "PlayerName" => 'required|regex:/[ء-ي\s]/',
            "Age" => 'required|numeric',
            "Phone" => 'required',
            "Phone2" => 'required',
            "Address" => 'required|regex:/[ء-ي\s]/',
            "DateOfBirth" => 'required',
            "Position" => 'required',
            "Height" => 'required|numeric',
            "Weight" => 'required|numeric',
            "GroupName" => 'required',
            "BranchName" => 'required',
            "CategoryName" => 'required',
            "VideoLink" =>'nullable|regex:/^((?:https?:)?\/\/)?((?:www|m)\.)?((?:youtube\.com|youtu.be))(\/(?:[\w\-]+\?v=|embed\/|v\/)?)([\w\-]+)(\S+)?$/',
        ],
        [
           
            "PlayerName.required" => 'من فضلك أدخل إسم اللاعب',
            "PlayerName.regex" => 'أدخل إسم اللاعب ثلاثى باللغة العربية',
            "Age.required" => 'من فضلك أدخل السن',
            "Age.numeric" => 'السن بالأرقام فقط',
            "Address.required" => 'من فضلك أدخل العنوان',
            "Address.regex" => 'العنوان باللغة العربية و الأرقام',
            "Phone.required" => 'من فضلك أدخل رقم التيليفون',
            "Phone.regex" => 'من فضلك أدخل رقم تيليفون  لاعب صحيح',
            "Phone2.required" => 'من فضلك أدخل رقم ولى الأمر',
            "Phone2.regex" => 'من فضلك أدخل رقم تيليفون  ولى أمر صحيح',
            "DateOfBirth.required" => 'من فضلك أدخل تاريخ الميلاد',
            "Position.required" => 'من فضلك أدخل المركز',
            "Height.required" => 'من فضلك أدخل الطول',
            "Height.numeric" => 'من فضلك أدخل الطول بالأرقام',
            "Weight.required" => 'من فضلك أدخل الوزن',
            "Weight.numeric" => 'من فضلك أدخل الوزن بالأرقام',
            "GroupName.required" => 'من فضلك أدخل إسم المجموعة',
            "BranchName.required" => 'من فضلك أدخل الفرع',
            "CategoryName.required" => 'من فضلك أدخل لينك فيديو صحيح',
            "VideoLink.regex" =>'من فضلك أدخل لينك فيديو صحيح',
        ]);

        $file =  $request->file('PlayerImage');

      
        if($file !== null){

            $fileName = time() . ".jpg";

            $file->move(public_path('playerimages'),$fileName); 

            Player::where("id",$id)->update([
                "PlayerName" => $request->PlayerName,
                "Age" => $request->Age,
                "Address" => $request->Address,
                "Phone1" => $request->Phone,
                "Phone2" => $request->Phone2,
                "DateOfBirth" => $request->DateOfBirth,
                "Position" => $request->Position,
                "Height" => $request->Height,
                "Weight" => $request->Weight,
                "GroupName" => $request->GroupName,
                "BranchName" => $request->BranchName,
                "CategoryName" => $request->CategoryName,
                "VideoLink" =>$request->VideoLink,
                "ImagePath" =>$fileName,
            ]);




        return redirect("/admin/players")->with("message","تم تعديل البيانات بنجاح");


        } else {

            Player::where("id",$id)->update([
                "PlayerName" => $request->PlayerName,
                "Age" => $request->Age,
                "Address" => $request->Address,
                "Phone1" => $request->Phone,
                "Phone2" => $request->Phone2,
                "DateOfBirth" => $request->DateOfBirth,
                "Position" => $request->Position,
                "Height" => $request->Height,
                "Weight" => $request->Weight,
                "GroupName" => $request->GroupName,
                "BranchName" => $request->BranchName,
                "CategoryName" => $request->CategoryName,
                "VideoLink" =>$request->VideoLink,
            ]);
        return redirect("/admin/players")->with("message","تم تعديل البيانات بنجاح");

    }
}

    
    public function getAllPlayers(){

      $data =  Player::get();

      $res = array();

      $res["status"] = 1;
      $res["response"] = $data;

      return response()->json($res);

    }

    public function ToggleActivePlayer($type,$id){

      if($type == "Active"){

        $updateToggle = SiteData::where('Name',"CountUnActive")->increment('Value', 1);

        $update = Player::where("id",$id)->update([
               "Status" => "UnActive" 
        ]);
        session()->flash("message","تم تعطيل اللاعب بنجاح");
      }  else {

        $update = Player::where("id",$id)->update([
            "Status" => "Active" 
         ]);
         session()->flash("message","تم تفعيل اللاعب بنجاح");
      }
      return redirect('/admin/players');

    }

    public function destroy($id)
    {
        return 'Page delete Player id With: ' . $id;
    }
}
