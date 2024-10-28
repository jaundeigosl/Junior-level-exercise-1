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
use App\Models\Transaction;
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
        $over35 = new Transaction;
        $under35 = new Transaction;

        $over35->sender_id = 2;
        $over35->receiver_id= $user->id;
        $over35->amount_transfered= 5;
        $over35->purpose='Welcome, for being 35 years old or over here is a little gift';
        $under35->sender_id = 2;
        $under35->receiver_id= $user->id;
        $under35->amount_transfered= 10;
        $under35->purpose='Welcome, for being under 35 here is a little gift';
        $age = false;

        if( $currentYear - $userYear >=35){
            User::where('id',$user->id)->update(['tokens' => $user->tokens + 5]);
        }else{
            if($userYear - $currentYear ==34){
                if($userMonth> $currentMonth){
                    User::where('id',$user->id)->update(['tokens' => $user->tokens + 10]);
                    $age = true;
                }else{
                    if($userMonth==$currentMonth){
                        if($userDay > $currentDay){
                            User::where('id',$user->id)->update(['tokens' => $user->tokens + 10]);
                            $age = true;
                        }else{
                            User::where('id',$user->id)->update(['tokens' => $user->tokens + 5]);
                        }
                    }else{
                        User::where('id',$user->id)->update(['tokens' => $user->tokens + 5]);
                    }
                }
            }else{
                User::where('id',$user->id)->update(['tokens' => $user->tokens + 10]);
                $age = true;
            }
        }   

        event(new Registered($user));

        Auth::login($user);

        //gift for the user's age

        ($age) ? $under35->save() : $over35->save();

        return redirect(route('referral-check', absolute: false));
    }
}
