<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index(){
        //passing the data to show the user own referral code and amount of referred users

        $user = auth()->user();
        $userCode =$user->referral()->select('code')->get();
        $referredUsers = $user->referral()->select('total_referred_users')->get();
        
        return view('dashboard',['code'=>$userCode[0]->code,'refUsers'=>$referredUsers[0]->total_referred_users]);
    }
}
