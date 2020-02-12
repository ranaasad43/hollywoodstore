<?php

namespace App\Http\Middleware;

use Closure;

class AdminRoutes
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

        //dd(session()->get('admin'));
        if(empty(session()->get('admin'))){
            return redirect('/');
        }
        return $next($request);
    }
}
