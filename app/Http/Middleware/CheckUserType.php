<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      //  \Log::info('CheckUserType middleware triggered.');
        if (Auth::check()) {
            $user = Auth::user();

            if (Auth::check()) {
              $user = Auth::user();

                // Redirect admin users trying to access non-admin routes
                if ($user->user_type === 'admin' && !$request->routeIs('dashboard')) {
                    return redirect()->route('dashboard');
                }

                // Redirect regular users trying to access admin routes
                if ($user->user_type === 'user' && !$request->routeIs('home.page')) {
                    return redirect()->route('home.page'); // Redirect to the correct landing page
                }
            }
        }

        return $next($request);
    }
}
