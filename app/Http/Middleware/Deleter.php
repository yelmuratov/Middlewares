<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Deleter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && (strtolower(trim(Auth::user()->role)) == 'deleter' || strtolower(trim(Auth::user()->role)) == 'admin')) { 
            return $next($request);
        }
        
        return response('Unauthorized', 401);        
    }
}
