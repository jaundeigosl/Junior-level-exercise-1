<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;


class ReferralCheckController extends Controller
{
    public function index(){
        return view('referralCheck');
    }
    
    public function check(Request $request){

        $user = auth()->user();

        if(!$user->referral_state){

            $request->validate([
                'code'=>'required|string|max:6|exists:referrals,code'
            ]);

            $ownerofTheCode = Referral::where('code',$request->code)->get();
            Referral::where('user_id',$ownerofTheCode[0]->user->id)->update(['total_referred_users' => $ownerofTheCode[0]->total_referred_users + 1]);
            User::where('id', $ownerofTheCode[0]->user->id)->update(['tokens' => $ownerofTheCode[0]->user->tokens + 5]);
            User::where('id',$user->id)->update(['tokens' => $user->tokens + 5 , 'referral_state' => true , 'referred_by' => $ownerofTheCode[0]->user->id]);
            Transaction::create([
                'sender_id'=>2,
                'purpose'=>'Using a referral code',
                'amount_transfered'=>5,
                'receiver_id'=> $user->id,
            ]);
            Transaction::create([
                'sender_id'=>2,
                'purpose'=>'Someone used your Referral Code',
                'amount_transfered'=>5,
                'receiver_id'=> $ownerofTheCode[0]->user->id,
            ]);

            return redirect('dashboard');

        }else{

            return back();
        }
    }
}
