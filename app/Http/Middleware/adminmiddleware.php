<?php

namespace App\Http\Middleware;
use App\Http\Controllers\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

use Closure;

class adminmiddleware
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
         if((\Auth::user() && \Auth::user()->hasRole('owner'))|| (\Auth::user() && \Auth::user()->hasRole('admin'))) {
            return $next($request);
		 }
	
		return redirect('/login');
    }
}
