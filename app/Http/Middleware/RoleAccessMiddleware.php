<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roll): Response
    {
        if (!Auth::check()){
            return redirect(route('login'));
        }
        if (!Auth::user()->hasRole($roll)) {
            return abort(403, 'Unauthorized action.');
        }


        return $next($request);
    }
}
