<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referral;

class DashboardController extends Controller
{
    public function index(){
        //passing the data to show the user own referral code and amount of referred users

        $userCode = auth()->user()->referral()->select('code')->get();
        $referredUsers = auth()->user()->referral()->select('total_referred_users')->get();
        
        return view('dashboard',['code'=>$userCode[0]->code,'refUsers'=>$referredUsers[0]->total_referred_users]);
    }
}
