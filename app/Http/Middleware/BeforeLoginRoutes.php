<?php

namespace App\Http\Middleware;

use Closure;

class BeforeLoginRoutes
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

        //dd('before login middleware');
        if(!empty(session()->get('userData'))){
            return redirect('/');
        }
        return $next($request);
    }
}
