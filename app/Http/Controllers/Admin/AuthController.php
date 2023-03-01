<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Auth;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function LoginPage()
    {
        return view("auth.index");
    }

    public function LoginLogic(Request $request)
    {   

        $request->validate([
            'username' => 'required|regex:/[a-z0-9]/',
            'password' => 'required'
        ],[
            'username.required'=>'من فضلك أدخل إسم المستخدم',
            'username.regex'=>'لا تستخدم الرموز والمسافات',
            'password.required'=>'من فضلك أدخل كلمة السر'
        ]);

        $username = $request->username;
        $password = $request->password;

       $user =  Auth::where("Username",$username)->where("Password",$password)->get()->first();

        if($user !== null){

          $request->session()->put('user-data', $user);
          
          
          switch ($user->Role) {

              case 'Admin':

                $request->session()->flash('user',$user);

                return redirect("/admin")->with('user', $user);
                
                break;
                
                case 'مدير إدخال بيانات':
                    return redirect("/admin/");           
                break;

                case 'مدخل بيانات':
                    return redirect("/admin/movments/create");
                break;

                case 'مدير الحركة':
                    return redirect("/admin/maintainces/create");
                break;

                case 'مسؤول مخزن':
                    return redirect("/admin/inventory/create");
                break;

                case 'مشتريات':
                    return redirect("/admin/purchases/create")->with('user', $user);
                break;
          }
          

        } else {

           $request->session()->flash("error","يرجى التأكد من بيانات الدخول");
           return redirect("/login");
        }
    }

    

    public function NewUserPage(Request $request)
    {   
        $data = Auth::all();

        return view("admin.user.index")->with("Users",$data);
    }   

    public function NewUserLogic(Request $request)
    {


        
        $request->validate([

            'FullName' => 'required|regex:/[ء-ي\s]/',
            'Username' => 'required|regex:/[0-9a-z]/|unique:users,username',
            'Password' => 'required',
            'Role' => 'required'

        ],[
            'FullName.required'=>'من فضلك أدخل إسم الحساب',
            'FullName.regex'=>'من فضلك أدخل الإسم باللغة العربية',
            'Username.required'=>'من فضلك أدخل إسم المستخدم',
            'Username.regex'=>'لا تستحدم المسافات أو الرموز',
            'Username.unique'=>'إسم المستخدم مستخدم من قبل',
            'Password.required'=>'من فضلك أدخل كلمة المرور',
            'Role.required'=>'من فضلك أدخل الصلاحية',
            
        ]);


           $new = Auth::create([
                'FullName' => $request->FullName,
                'Username' => $request->Username,
                'Password' => $request->Password,
                'Role' => $request->Role
            ]);
            $new->save();
            $request->session()->flash('message', 'تم إضافة المستخدم بنجاح');

            return redirect("/admin/newuser");

    }

    public function DeleteUserLogic($id)
    {
        Auth::where("id",$id)->delete();
        session()->flash('message', 'تم حذف المستخدم بنجاح');

        return redirect("/admin/newuser");
    }
    public function LogOutLogic(Request $request)
    {
        $request->session()->flush();
        return redirect("/login");
    }



}
