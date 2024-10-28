<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recharge;
use App\Models\User;
use Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Models\Transaction;

class stripeController extends Controller
{
    public function index(){
        return view('components.transactions-recharge');
    }

    public function checkout(Request $request){
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $session = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'gbp',
                        'product_data' => [
                            'name' => 'Tokens'
                        ],
                        'unit_amount' => 300, //300 => 3 pounds per token
                    ],
                    'quantity' => $request->conversionAmount,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('stripe-Success', [], true)."?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('stripe-Cancel', [], true),
        ]);

        $recharge = new Recharge();
        $recharge->status = 'unpaid';
        $recharge->total_tokens = $request->conversionAmount;
        $recharge->total_price = $request->conversionAmount * 3 ; //tokens amount * 3
        $recharge->session_id =$session->id; 
        $recharge->save();

        return redirect($session->url);
    }

    public function success(Request $request){

        $user = auth()->user();
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $sessionId = $request->input('session_id');
        $session = \Stripe\Checkout\Session::retrieve($sessionId);
        
        try{
            if(is_null($session)){
                throw new NotFoundHttpException;
            }

            $recharge = Recharge::where('session_id', $session->id)->where('status','unpaid')->first();

            if(is_null($recharge)){

                throw new NotFoundHttpException;
            }

            Transaction::create([
                'sender_id' => 2,
                'purpose' => 'Tokens Recharge',
                'amount_transfered' => $recharge->total_tokens,
                'receiver_id' => $user->id,
            ]);
            User::where('id',$user->id)->update(['tokens'=>$user->tokens + $recharge->total_tokens]);
            Recharge::where('id',$recharge->id)->update(['status'=>'paid']);
            
            
            return view('components.stripe-success');

        }catch(\Exception $e){
            throw new NotFoundHttpException;
        }
    }

    public function cancel(){
        return view('components.stripe-cancel');
    }

}