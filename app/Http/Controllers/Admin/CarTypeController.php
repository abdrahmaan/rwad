<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\CarType;
use App\Models\Car;

use Illuminate\Http\Request;

class CarTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Data = CarType::all();

        return view("admin.cartype.index" , ["CarType" => $Data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.cartype.create");
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
            "CarType" => "required|unique:car_type,CarType",
            "CarImg" => "nullable",
            "SollarType" => "required",
            "Sollar" => "required|numeric|min:1",
            "Zeet" => "required|numeric|min:1",
            "FilterZ" => "required|numeric|min:1",
            "FilterH" => "required|numeric|min:1",
            "Sior" => "required|numeric|min:1",
            "Kawtsh" => "required|numeric|min:1",
            "Dbryag" => "required|numeric|min:1",
            "Framel" => "required|numeric|min:1",
        ],
        [
            "CarType.required" => "حقل نوع السيارة مطلوب",
            "CarType.unique" => " نوع السيارة مسجل من قبل",
            "SollarType.required" => "نوع وقود السيارة مطلوب",
            "Sollar.required" => "عدد الكيلوهات لـ لتر الوقود مطلوب",
            "Sollar.numeric" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "Sollar.min" => "عدد الكيلوهات يجب أن يكون أكبر من 1",
            "Zeet.required" => "حقل تغيير زيت لكل كيلومتر مطلوب",
            "Zeet.numeric" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "Zeet.min" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "FilterZ.required" =>"حقل تغيير فلتر زيت لكل كيلومتر مطلوب",
            "FilterZ.numeric" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "FilterZ.min" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "FilterH.required" => "حقل تغيير فلتر هواء لكل كيلومتر مطلوب",
            "FilterH.numeric" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "FilterH.min" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "Sior.required" => "حقل تغيير سيور لكل كيلومتر مطلوب",
            "Sior.numeric" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "Sior.min" =>"عدد الكيلوهات يجب أن يكون رقم صحيح",
            "Kawtsh.required" => "حقل تغيير كاوتش لكل كيلومتر مطلوب",
            "Kawtsh.numeric" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "Kawtsh.min" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "Dbryag.required" =>"حقل تغيير دبرياج لكل كيلومتر مطلوب",
            "Dbryag.numeric" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "Dbryag.min" =>"عدد الكيلوهات يجب أن يكون رقم صحيح",
            "Framel.required" => "حقل تغيير فرامل لكل كيلومتر مطلوب",
            "Framel.numeric" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "Framel.min" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
        ]);
          $CarImg =  $request->file('CarImg');

            if(isset($CarImg)){
                
                // Store Image
               $ImgName = time() . ".jpg";
               $CarImg->move(public_path("includes/car_imgs"),$ImgName);

                
               // Store Data

               CarType::create([
                "CarType" => $request->CarType,
                "CarImg" => $ImgName,
                "SollarType" => $request->SollarType,
                "Sollar"  => $request->Sollar,
                "Zeet"  => $request->Zeet,
                "FilterZ" => $request->FilterZ,
                "FilterH" => $request->FilterH,
                "Sior" => $request->Sior,
                "Kawtsh" => $request->Kawtsh,
                "Dbryag" => $request->Dbryag,
                "Framel" => $request->Framel,
               ]);

             session()->flash("message","تم إضافة نوع السيارة بنجاح");
               return redirect("/admin/cartypes/create");

            } else {


                CarType::create([
                    "CarType" => $request->CarType,
                    "CarImg" => "defaultCar.jpg",
                    "SollarType" => $request->SollarType,
                    "Sollar"  => $request->Sollar,
                    "Zeet"  => $request->Zeet,
                    "FilterZ" => $request->FilterZ,
                    "FilterH" => $request->FilterH,
                    "Sior" => $request->Sior,
                    "Kawtsh" => $request->Kawtsh,
                    "Dbryag" => $request->Dbryag,
                    "Framel" => $request->Framel,
                   ]);

                   session()->flash("message","تم إضافة نوع السيارة بنجاح");
                   return redirect("/admin/cartypes/create");
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       $CarData = CarType::where("id",$id)->get()->first();

        return view("admin.cartype.edit" ,["Car"=>$CarData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            "Sollar" => "required|numeric|min:1",
            "Zeet" => "required|numeric|min:1",
            "FilterZ" => "required|numeric|min:1",
            "FilterH" => "required|numeric|min:1",
            "Sior" => "required|numeric|min:1",
            "Kawtsh" => "required|numeric|min:1",
            "Dbryag" => "required|numeric|min:1",
            "Framel" => "required|numeric|min:1",
        ],
        [
            "Sollar.required" => "عدد الكيلوهات لـ لتر الوقود مطلوب",
            "Sollar.numeric" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "Sollar.min" => "عدد الكيلوهات يجب أن يكون أكبر من 1",
            "Zeet.required" => "حقل تغيير زيت لكل كيلومتر مطلوب",
            "Zeet.numeric" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "Zeet.min" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "FilterZ.required" =>"حقل تغيير فلتر زيت لكل كيلومتر مطلوب",
            "FilterZ.numeric" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "FilterZ.min" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "FilterH.required" => "حقل تغيير فلتر هواء لكل كيلومتر مطلوب",
            "FilterH.numeric" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "FilterH.min" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "Sior.required" => "حقل تغيير سيور لكل كيلومتر مطلوب",
            "Sior.numeric" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "Sior.min" =>"عدد الكيلوهات يجب أن يكون رقم صحيح",
            "Kawtsh.required" => "حقل تغيير كاوتش لكل كيلومتر مطلوب",
            "Kawtsh.numeric" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "Kawtsh.min" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "Dbryag.required" =>"حقل تغيير دبرياج لكل كيلومتر مطلوب",
            "Dbryag.numeric" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "Dbryag.min" =>"عدد الكيلوهات يجب أن يكون رقم صحيح",
            "Framel.required" => "حقل تغيير فرامل لكل كيلومتر مطلوب",
            "Framel.numeric" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
            "Framel.min" => "عدد الكيلوهات يجب أن يكون رقم صحيح",
        ]);

        
        CarType::where("id",$id)->update([

            "Sollar"  => $request->Sollar,
            "Zeet"  => $request->Zeet,
            "FilterZ" => $request->FilterZ,
            "FilterH" => $request->FilterH,
            "Sior" => $request->Sior,
            "Kawtsh" => $request->Kawtsh,
            "Dbryag" => $request->Dbryag,
            "Framel" => $request->Framel,
           ]);

           session()->flash("message","تم تعديل نوع السيارة بنجاح");
           return redirect("/admin/cartypes");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         CarType::where("id",$id)->delete();


         $CarImg  = CarType::where("id",$id)->select("CarImg")->first();

        unlink(public_path("includes/car_imgs/$CarImg->CarImg"));

         session()->flash("message","تم حذف نوع السيارة بنجاح");
         return redirect("/admin/cartypes");
    }
}
