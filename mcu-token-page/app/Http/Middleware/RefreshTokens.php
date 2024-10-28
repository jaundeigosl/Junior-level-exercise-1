<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;

class RefreshTokens
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $userTokens = auth()->user()->tokens;
        if(is_null(Session('ownTokens'))){
            Session::put('ownTokens',$userTokens);
        }else{
            Session::put('ownTokens', $userTokens);
        }

        return $next($request);
    }
}
