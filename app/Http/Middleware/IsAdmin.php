<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        if ($request->url('admin/login')) {
            if (Auth::check()) {
                // Check if the authenticated user's ID is in the admins table
                if (Admin::where('user_id', Auth::id())->exists()) {
                    return $next($request);
                }
                else return abort('404');
            }
        }
        return $next($request);
    }
}
