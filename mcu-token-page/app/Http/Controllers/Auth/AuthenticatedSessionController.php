<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Closure;
use Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */

     public $user;

    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $user= auth()->user();

        if($user->multiple_auth){
            $request->session()->regenerate();        
            return redirect(route('multiAuth'));
        }

        return redirect()->intended(route('dashboard', absolute: false));
    }

    public function multiAuth(){

        if(!Session::has('authOption')){
            Session::put('authOption',random_int(1,2));
        }

        if(Session::get('authOption') == 1){
            return view('components.multi-auth1');
        }
        else{
            return view('components.multi-auth2');
        }
    }

    public function checkMultiAuth(Request $request){

        $this->user=auth()->user();

        if($request->has('birth')){

            $request->validate([
                'birth' => ['required','date',function (string $attribute ,mixed $value, Closure $fail){
                                                        if($this->user->birth != $value){
                                                            $fail('Incorrect Birth');
                                                        }
                }]
            ]);

            Session::put('secondAuth',true);

            return redirect(route('dashboard'));
        }else{

            $request->validate([
                'city' => ['required','string','max:50',function (string $attribute ,mixed $value, Closure $fail){
                                                        if($this->user->city != $value){
                                                            $fail('Incorrect city');
                                                        }
                }]
            ]);

            Session::put('secondAuth',true);

            return redirect(route('dashboard'));
        }
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
