<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected string $user_route  = 'user.login';
    protected string $admin_route = 'admin.login';
    protected string $teacher_route = 'teacher.login';
    
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            if (Route::is('user.*')) {
                return route($this->user_route);
            } elseif (Route::is('admin.*')) {
                return route($this->admin_route);
            } elseif (Route::is('teacher.*')) {
                return route($this->teacher_route);
            }
        }
    }
}
