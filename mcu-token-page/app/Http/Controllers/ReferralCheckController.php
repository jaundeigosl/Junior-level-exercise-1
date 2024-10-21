<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ReferralCheckController extends Controller
{
    public function index(){
        return view('referralCheck');
    }
    
    public function check(Request $request){

       $request->validate([
        'code'=>'required|string|max:6|exists:referrals,code'
       ]);
       
       return redirect('dashboard');
    }
}
