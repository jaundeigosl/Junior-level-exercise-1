<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        //passing the data to show the user own referral code and amount of referred users

        $user = auth()->user();
        $userCode =$user->referral()->select('code')->get();
        $referredUsers = $user->referral()->select('total_referred_users')->get();
        
        return view('dashboard',['code'=>$userCode[0]->code,'refUsers'=>$referredUsers[0]->total_referred_users,'auth' =>$user->multiple_auth]);
    }

    public function authToggle(Request $request){
        $user = auth()->user();

        if($request->authValue == "true"){
            User::where('id',$user->id)->update(['multiple_auth'=>true]);
        }else{
            User::where('id',$user->id)->update(['multiple_auth'=>false]);
        }
        return redirect(route('dashboard'));
    }   
}
