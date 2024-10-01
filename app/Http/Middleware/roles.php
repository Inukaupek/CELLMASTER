<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user's role matches any of the allowed roles
        if ($user && in_array($user->user_role, $roles)) {
            return $next($request);
        }

        // If user is not authorized, return a 403 response
        return abort(403, 'Unauthorized access to this page.');
    }
}
