<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilamentAdminSession
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            session(['auth_guard' => 'admin']);
        }

        return $next($request);
    }
}

