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
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    private const GUARD_USER = 'users';
    private const GUARD_ADMIN = 'admins';
    private const GUARD_TEACHER = 'teachers';

    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::guard(self::GUARD_USER)->check() && $request->routeIs('user.*')) {
            return redirect(RouteServiceProvider::HOME);
        }
        if (Auth::guard(self::GUARD_ADMIN)->check() && $request->routeIs('admin.*')) {
            return redirect(RouteServiceProvider::ADMIN_HOME);
        }
        if (Auth::guard(self::GUARD_TEACHER)->check() && $request->routeIs('teacher.*')) {
            return redirect(RouteServiceProvider::TEACHER_HOME);
        }

        return $next($request);
    }
}