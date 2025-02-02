<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckForgotPassword
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        // Check if the user has completed the "Forgot Password" process
        if (!$user || !$user->forgot_password == 1) {
            return redirect()->route('password.request')
                ->with('error', 'You must complete the forgot password process before accessing the admin panel.');
        }

        return $next($request);
    }
}
