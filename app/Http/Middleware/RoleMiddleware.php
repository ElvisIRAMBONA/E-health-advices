<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Vérifier si l'utilisateur est authentifié
        if (!Auth::check()) {
            abort(403, 'Unauthorized action.');
        }

        // Vérifier si l'utilisateur a le rôle
        if (Auth::user()->role !== $role) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}