<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        {
            if (Auth::guard('admin')->check()) {
                // If the user is authenticated, redirect to the home page or dashboard.
                return redirect('admin/Dashboard');
            }

            return $next($request);
        }
    }
}
