<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Referral;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //validating the new users data
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'lastname' =>['required', 'string', 'max:100'],
            'birth' => ['required','date'],
            'country' =>['required','string'],
            'city' => ['required', 'string' , 'max:100'],
            'address' => ['required', 'string', 'max:250'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        //creating the user
        $user = User::create([
            'name' => $request->name,
            'lastname'=> $request->lastname,
            'birth' => $request->birth,
            'country' => $request->country,
            'city' => $request->city,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //creating the user's referral code
        Referral::create([
            'user_id'=>$user->id,
            'code'=>Str::random(6)
        ]);

        //calculating the age
        $userBirth = $user->birth;
        $userYear = substr($userBirth,0,4);
        $userMonth = substr($userBirth,5,4);;
        $userDay = substr($userBirth,10,4);;;
        $currentYear = now()->year;
        $currentMonth = now()->month;
        $currentDay = now()->day;

        if( $currentYear - $userYear >=35){
            User::where('id',$user->id)->update(['tokens' => $user->tokens + 5]);
        }else{
            if($userYear - $currentYear ==34){
                if($userMonth> $currentMonth){
                    User::where('id',$user->id)->update(['tokens' => $user->tokens + 10]);
                }else{
                    if($userMonth==$currentMonth){
                        if($userDay > $currentDay){
                            User::where('id',$user->id)->update(['tokens' => $user->tokens + 10]);
                        }else{
                            User::where('id',$user->id)->update(['tokens' => $user->tokens + 5]);
                        }
                    }else{
                        User::where('id',$user->id)->update(['tokens' => $user->tokens + 5]);
                    }
                }
            }else{
                User::where('id',$user->id)->update(['tokens' => $user->tokens + 10]);
            }
        }   


        event(new Registered($user));

        Auth::login($user);

        return redirect(route('referral-check', absolute: false));
    }
}
