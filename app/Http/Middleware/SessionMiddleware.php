<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class SessionMiddleware
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
        $session = [];
        foreach (Session::all() as $key => $value) {
            if ( $key != "password" && $key != "remember_token" && $key != "api_token") {
                $session[$key] = $value;      
            }
        }        
        if ( Session::has( 'email') ) {
            return $next($request);
        }
        return redirect()->route('/');
    }
}
