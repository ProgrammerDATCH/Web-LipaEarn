<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CheckStatus
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if (!Auth::check()) {
            return Redirect::route('ShowLoginForm');
        }
        if ($user->status != "Active") {
            return Redirect::route('ShowUnpayedPage');
        }
    
        return $next($request);
    }

}