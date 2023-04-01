<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;


class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($title,$body,$image = "",$roles)
    {
     

    }

    // Save User Token
    public function FCM_Save_Token(Request $request){
        $token = $request->token;
        $username = $request->username;
        $device = $request->device;

        $data = [
            "token" => $token,
            "username" => $username,
            "device" => $device,
        ];

        $response = [
            "status" => 1,
            "mssg" => "$device Token Saved",
        ];


        switch ($device) {
            case 'pc':
                User::where("Username",$username)
                ->update([
                    "token_pc" => $token
                ]);
                 return json_encode($response);
                
                break;
            case 'mopile':
                User::where("Username",$username)
                ->update([
                    "token_mopile" => $token
                ]);
                 return json_encode($response);
                break;

        }

        return json_encode($data);
    }

    public function Send_FCM($title = "الرواد هاى سيرفيس",$body = "إختبار الإشعارات",$image = "",$roles = "الكل"){

        $registration_ids = [];

        if($roles == "الكل"){

                
            $tokens_pc = User::whereNotNull('token_pc')->pluck('token_pc')->toArray();
            $tokens_mopile = User::whereNotNull('token_mopile')->pluck('token_mopile')->toArray();
       
            
            $Mobile_And_PC_Tokens = array_merge($tokens_pc, $tokens_mopile);
            $registration_ids = array_merge($registration_ids,$Mobile_And_PC_Tokens);


        } else {

            foreach ($roles as $role) {

                $tokens_pc = User::whereNotNull('token_pc')->where('Role', $role)->pluck('token_pc')->toArray();
                $tokens_mopile = User::whereNotNull('token_mopile')->where('Role', $role)->pluck('token_mopile')->toArray();
     
                $Mobile_And_PC_Tokens = array_merge($tokens_pc, $tokens_mopile);
                $registration_ids = array_merge($registration_ids,$Mobile_And_PC_Tokens);
     
             }

        }

        if($registration_ids){

            $ch = curl_init();
    
            $ServerKey = "AAAAOKq699c:APA91bEw7kBANGdxHUpQRS52rfw73nySdercsfi2fx3pu2rA_UsoCoQQb2neNWY_zqmOhF8jM2ZikFA1B7V8IXguhGxTu9uazuXVXfMbXfJHXFPSTRH5uvW01KFiGBYnXm5LRPxvQAKM";
            
            $notification = array
                  (
                    'registration_ids'   => $registration_ids,
                    'notification'  => [
                    "title"=> $title,
                    "body"=> $body,
                    "icon"=> "https://alrwad.abdelrahmaan.com/includes/img/logo.png",
                    "click_action"=> "https://alrwad.abdelrahmaa.com/admin/notifcations",
                    "image"=> $image
                    ]
                 );
    
        
    
            $headers = array
                    (
                        'Authorization: key=' . $ServerKey,
                        'Content-Type: application/json'
            );
    
            curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
            curl_setopt( $ch,CURLOPT_POST, true );
            curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
            curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode($notification) );
    
            $result = curl_exec($ch);
    
            return dd($result);
        } 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
