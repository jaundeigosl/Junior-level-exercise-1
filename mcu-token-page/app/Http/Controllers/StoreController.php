<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Foundation\Http\Events\RequestHandled;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use Session;
use Closure;

class StoreController extends Controller
{
    public $total;

    public function index(){
        $products = Product::all();
        if(Session::has('success')){
            return view('store',['products' => $products])->with('success','success');
        }
        return view('store',['products' => $products]); 
    }

    public function show(Request $request){
        
        $product = Product::find($request->product_id);
        return view('components.store-show', ['product' => $product, 'user'=> auth()->user()]);

    }

    public function store(Request $request){

        $user = auth()->user();
        $product = Product::find($request->product);
        $this->total = $product->price * $request->quantity;
        $request->validate([
            'address' => ['required','string','max:160'],
            'quantity' => ['required','numeric','min:1','max:100'],
            'product' => ['required','numeric',function(string $attribute ,mixed $value, Closure $fail){
                                                if(auth()->user()->tokens < $this->total){
                                                    $fail('Insufficient Tokens');
                                                }
            }]
        ]);

        Transaction::create([
            'sender_id' => $user->id,
            'purpose' => 'purcharse of '.$product->product_name.', Amount:'.$request->quantity.', Destination:'.$request->address,
            'amount_transfered' => $this->total,
            'receiver_id' => 2,
        ]);

        User::where('id', $user->id)->update(['tokens' => $user->tokens - $this->total]);

        return redirect('/store')->with('success','success');

    }




}
