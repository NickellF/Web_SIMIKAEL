<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu');
        }

        if (empty($roles)) {
            return $next($request);
        }

        if (in_array(Auth::user()->role, $roles)) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Anda tidak memiliki akses');
    }
}