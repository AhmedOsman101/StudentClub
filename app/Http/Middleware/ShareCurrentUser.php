<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ShareCurrentUser {
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
        // Get the current logged-in user
        $user = $request->user()
            ?? Auth::user();
        
        // Share the current user with all views
        view()->share('currentUser', $user);
        return $next($request);
    }
}
