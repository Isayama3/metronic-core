<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        // Check if user is authenticated and has permission
        if ($user->hasAnyPermission($request->route()->getName())) {
            return $next($request);
        }

        // If user does not have permission, abort with 403 Forbidden response
        abort(403, 'Unauthorized action.');
    }
}
