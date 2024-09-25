<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $roles)
{
    $user = Auth::user();

    $rolesArray = explode(',', $roles);

    // Check if the user's role matches any of the allowed roles
    if ($user && in_array($user->user_role, $rolesArray)) {
        return $next($request);
    }


    return abort(403, 'Unauthorized access to this page.');
}

}
