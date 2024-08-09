<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckDesignation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if ($request->user() && $request->user()->designation === 'Admin') {
            // User is an admin, allow access
            return $next($request);
        }

        // User is not an admin, deny access
        return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
    }
}
