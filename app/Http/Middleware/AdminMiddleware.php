<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is an admin
      //  if (Auth::check() && Auth::user()->role === 'admin') {
        //    return $next($request);
       // }

        // Redirect or abort if not an admin
       // return redirect('/')->with('error', 'You do not have admin access.');
       //if user is not logged in
       //if user is not logged in
          if (!Auth::check()) {
        return redirect()->route('login');
       }
        return $next($request);
        
          $userRole=Auth::user()->role;
       //superAdmin
       if ($userRole===1) {
        return redirect()->route('super_admin.dashboard');
       }
       //Admin
       elseif ($userRole===2) {
         return redirect()->route('home');
            
       }
       //normal user
       elseif ($userRole===3) {
          return redirect()->route('home');
       }
    }
}