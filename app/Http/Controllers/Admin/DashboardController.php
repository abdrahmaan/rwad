<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;

use App\Models\Branch;
use App\Models\Payout;
use App\Models\Player;
use App\Models\SiteData;
use App\Models\Payment;
use Illuminate\Http\Request;

use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
 


     public function index()
    {

                 
        $StartDate = date("01-m-y");
        $EndDate = date("31-m-y");


        // Players Count
         $TotalPlayers = Player::count();
         $TotalPlayersActive = Player::where("Status","Active")->count();
         $TotalPlayersUnActive = Player::where("Status","UnActive")->count();
         $TotalPlayersUnActive = Player::where("Status","UnActive")->count();
         $TotalPlayersUnActiveMonth = SiteData::where("Name","CountUnActive")->first()->Value;

         // GroupCount
         $GroupsCount = Group::count();

         // BranchCount
         $BranchesCount = Branch::count();

        // Payments/Month & Today
        $PaymentTotalMonth = Payment::where("created_at",">=", $StartDate)->where("created_at","<=" ,$EndDate)->sum("Amount");
        $PaymentCountMonth = Payment::where("created_at",">=", $StartDate)->where("created_at","<=" ,$EndDate)->count();
        $PaymentTotalToday = Payment::whereDate('created_at', Carbon::today())->sum("Amount");
        
        // Payout/Month & Today
        $PayoutTotalMonth = Payout::where("created_at",">=", $StartDate)->where("created_at","<=" ,$EndDate)->sum("Amount");
        $PayoutCountMonth = Payout::where("created_at",">=", $StartDate)->where("created_at","<=" ,$EndDate)->count();
        $PayoutTotalToday = Payout::whereDate('created_at', Carbon::today())->sum("Amount");

        $data = [

            'TotalPlayers' => $TotalPlayers,
            'TotalPlayersActive' => $TotalPlayersActive,
            'TotalPlayersUnActive' => $TotalPlayersUnActive,
            'TotalPlayersUnActiveMonth' => $TotalPlayersUnActiveMonth,
            'GroupsCount' => $GroupsCount,
            'BranchesCount' => $BranchesCount,
            'PaymentTotalMonth' => $PaymentTotalMonth,
            'PaymentCountMonth' => $PaymentCountMonth,
            'PaymentTotalToday' => $PaymentTotalToday,
            'PayoutTotalMonth' => $PayoutTotalMonth,
            'PayoutCountMonth' => $PayoutCountMonth,
            'PayoutTotalToday' => $PayoutTotalToday,
        ];


        // return dd();

        return view('admin.index')->with("data",$data);
    }



}
