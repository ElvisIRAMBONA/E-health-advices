<?php
namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        // Check if the user is logged in and has the role 2 (admin)
        if (Auth::user() && Auth::user()->role_id == 2) {
            return $next($request);
        }

        // Redirect if not admin
        return redirect('/')->with('error', 'Access Denied');
    }
}