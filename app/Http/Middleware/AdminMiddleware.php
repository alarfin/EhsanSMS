<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminMiddleware
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
		if (Auth::check() && Auth::user()->role == 'root') {
			return $next($request);
		}
		if (Auth::check() && Auth::user()->role == 'client') {
			return redirect()->route('client');
		}
    }
	
}
