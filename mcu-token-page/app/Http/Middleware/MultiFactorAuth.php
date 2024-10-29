<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;

class MultiFactorAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        $user = auth()->user();
        if($user->multiple_auth){
            if(!(Session::has('secondAuth'))){
                return redirect()->back();
            }else{
                if(!Session::get('secondAuth')){
                    return redirect()->back();
                }
            }

        }
        return $next($request);
    }
}
