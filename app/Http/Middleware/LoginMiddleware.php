<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->path()=="login" && Auth::check()){
            return redirect('/');
        }
        elseif($request->path()=="register" && Auth::check()){
            return redirect('/');
        }
        elseif($request->path()=="logout" && !Auth::check()){
            return redirect('/login');
        }
        else{
            return $next($request);
        }
    }
}
