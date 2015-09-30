<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Amministrazione
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
        if(!Auth::check()){
            return redirect()->intended("/");
        }
        return $next($request);
    }
}