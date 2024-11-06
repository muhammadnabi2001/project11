<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Check
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        //dd(Auth::user()->role);
        $userRoles=Auth::user()->roles;
       //dd(Auth::user()->roles);
        if(Auth::check() && $userRoles->whereIn('name',$roles)->first())
        {
            //dd(123);
            return $next($request);
        }
        abort(403);
    }
}
