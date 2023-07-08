<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NotLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $notLoggedIn = $request->session()->get("LoginId");
        if(!$notLoggedIn){
            return back()->with("msg" , "Please Login Your Account");
        }
        return $next($request);
    }
}
