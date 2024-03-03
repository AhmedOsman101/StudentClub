<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShareCurrentUser {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    
    public function handle(Request $request, Closure $next): Response {
        // Get the current logged-in user
        $user = $request->user() ?? auth()->user();

        // Share the current user with all views
        view()->share('currentUser', $user);

        return $next($request);
    }
}
