<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->status == 1 && (Auth::user()->role == 'admin' || Auth::user()->role == 'mod')) {
            return $next($request);
        } else {
            Auth::logout();
            return redirect()->route('login')->with('msg', 'Bạn không có quyền');
        }
    }
}
