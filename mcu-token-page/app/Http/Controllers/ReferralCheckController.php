<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use Illuminate\Http\Request;
use App\Models\User;


class ReferralCheckController extends Controller
{
    public function index(){
        return view('referralCheck');
    }
    
    public function check(Request $request){

       $request->validate([
        'code'=>'required|string|max:6|exists:referrals,code'
       ]);

        $OwnerofTheCode = Referral::where('code',$request->code)->get();
        User::where('id', $OwnerofTheCode[0]->user->id)->update(['tokens' => $OwnerofTheCode[0]->user->tokens + 5]);
        User::where('id',auth()->user()->id)->update(['tokens' => auth()->user()->tokens + 5 , 'referral_state' => true]);

       return redirect('dashboard');
    }
}
