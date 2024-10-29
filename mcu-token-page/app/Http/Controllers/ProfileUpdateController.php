<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Closure;
class ProfileUpdateController extends Controller
{
    public function city(Request $request){

        $validated = $request->validate ([
            'current_city' => ['required','string','max:100',function(string $attribute , mixed $value, Closure $fail){
                                                            if(auth()->user()->city != $value){
                                                                $fail('Incorrect City');
                                                            }
            }],
            'new_city'=>['required','string','max:100']
        ]);

        User::where('id',auth()->user()->id)->update(['city'=>$request->new_city]);
        
        return back()->with('status', 'city-updated');
    }
}
