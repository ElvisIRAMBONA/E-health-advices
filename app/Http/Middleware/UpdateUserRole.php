<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class UpdateUserRole
{
    public function handle($request, Closure $next)
    {
        // Assign 'admin' role to a specific user by their email
        User::where('email', 'admin@example.com')->update(['role' => 'admin']);

        // Assign 'customer' role to all other users
        User::where('role', null)->update(['role' => 'customer']);

        return $next($request);
    }
}