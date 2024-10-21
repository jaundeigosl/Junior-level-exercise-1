<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Closure;


class TransactionController extends Controller
{

    public function index(){

        $userTokens = auth()->user()->tokens;
        
        return view('transactions',['ownTokens'=> $userTokens]);
    }

    public function store(Request $request){
        
        $request->validate([
           'for' => ['required','email','max:100','exists:users,email', function(string $attribute ,mixed $value, Closure $fail){
                                                                            if($value == auth()->user()->email){
                                                                                $fail("It can't be your own email.");}}],
           'purpose' => 'required|string|max:200',
           'amount' => ['required','numeric','min:0.1','max:1000',function(string $attribute ,mixed $value, Closure $fail){
                                                                    if($value > auth()->user()->tokens){
                                                                        $fail("Not enough Tokens");
                                                                    }}]
        ]);

        $reciever = User::where('email',$request->for)->get();

        Transaction::create([
            'sender_id' => auth()->user()->id,
            'purpose' => $request->purpose,
            'amount_transfered' => $request->amount,
            'receiver_id' =>$reciever[0]->id,
        ]);

        User::where('id',auth()->user()->id)->update(['tokens'=> auth()->user()->tokens - $request->amount]);
        User::where('id',$reciever[0]->id)->update(['tokens'=> $reciever[0]->tokens + $request->amount]);
        
        $messages['invalid']='false';
        return redirect('transactions')->with('successful',true);
    }

    public function show(){

    }
    public function delete(){

    }

    public function update(){

    }
}
