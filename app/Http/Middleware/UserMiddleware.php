<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //if user is not logged in
          if (!Auth::check()) {
        return redirect()->route('login');
       }
        return $next($request);
        
          $userRole=Auth::user()->role;
       //superAdmin
       if ($userRole==1) {
        return redirect()->route('super_admin.dashboard');
       }
       //Admin
       elseif ($userRole==2) {
            return redirect()->route('admin.dashboard');
       }
       //normal user
       elseif ($userRole==3) {
           return $next($request); 
       }
    }
}