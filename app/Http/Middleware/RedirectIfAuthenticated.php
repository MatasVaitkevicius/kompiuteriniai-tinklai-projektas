<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() && auth()->user()->user_type == 'admin'){
                return redirect(RouteServiceProvider::ADMIN);
            }

            if (Auth::guard($guard)->check() && auth()->user()->user_type == 'director'){
                return redirect(RouteServiceProvider::DIRECTOR);
            }

            if (Auth::guard($guard)->check() && auth()->user()->user_type == 'user'){
                return redirect(RouteServiceProvider::USER);
            }
        }
        return $next($request);
        // $guards = empty($guards) ? [null] : $guards;
        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         return redirect(RouteServiceProvider::HOME);
        //     }
        // }
        // return $next($request);
    }
}
