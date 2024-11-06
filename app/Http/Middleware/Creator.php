<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Creator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && (strtolower(trim($request->user()->role)) == 'creator' || strtolower(trim($request->user()->role)) == 'admin')) {
            return $next($request);
        }
        
        return response('Unauthorized', 401);        
    }
}
