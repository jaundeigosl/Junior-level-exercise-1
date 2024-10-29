<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Closure;
use Session;


class TransactionController extends Controller
{

    public function index(){
        if(Session::has('success')){
            return view('components.transactions-form')->with('success','success');
        }

        return view('components.transactions-form');
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
        $user = auth()->user();

        Transaction::create([
            'sender_id' => $user->id,
            'purpose' => $request->purpose,
            'amount_transfered' => $request->amount,
            'receiver_id' =>$reciever[0]->id,
        ]);

        User::where('id',$user->id)->update(['tokens'=> $user->tokens - $request->amount]);
        User::where('id',$reciever[0]->id)->update(['tokens'=> $reciever[0]->tokens + $request->amount]);
        
        return redirect('/transactions/form')->with('success','success');
    }

    public function show(){

        $user = auth()->user();
        $lastTransactions = Transaction::latest()->where('sender_id', $user->id)->orWhere('receiver_id', $user->id)->get();
        $transactionDataWithNames = collect([]);

        foreach($lastTransactions as $transaction){

            $data = [];

            if($transaction->sender_id == $user->id){

                $userReceiver = User::find($transaction->receiver_id);
                $data+= 
                ['sender_name'=>$user->name,
                'sender_lastname'=>$user->lastname,
                'receiver_name'=>$userReceiver->name,
                'receiver_lastname'=>$userReceiver->lastname
                ];

            }else{

                $userSender = User::find($transaction->sender_id);
                $data+=
                ['sender_name'=>$userSender->name,
                'sender_lastname'=>$userSender->lastname,
                'receiver_name'=>$user->name,
                'receiver_lastname'=>$user->lastname];
            }

            $data += ['amount' => $transaction->amount_transfered,
                'transaction_id' => $transaction->id,
                'purpose' => $transaction->purpose,
                'time' => $transaction->created_at
            ];

            $transactionDataWithNames->push($data);
        }
        
        return(view('components.transactions-show', ['transactions' => $transactionDataWithNames]));
    }
}
