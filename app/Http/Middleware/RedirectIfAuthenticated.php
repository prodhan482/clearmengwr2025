<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Closure;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();

                if ($user->hasRole('SUPER_ADMIN')) {
                    return redirect()->route('dashboard');  // Admin dashboard
                }

                if ($user->hasRole('USER')) {
                    return redirect()->route('user-dashboard');  // User dashboard
                }

                // fallback for other roles or no role assigned
                return redirect('/');
            }
        }

        return $next($request);
    }
}
