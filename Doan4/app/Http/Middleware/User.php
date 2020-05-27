<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class User
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
        if(!Auth::guard('admin')->check())
        {
            return redirect('/Home1/login');
        }
        return $next($request);
    }
}
