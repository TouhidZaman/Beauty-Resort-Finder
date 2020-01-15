<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AccessAdmin
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
        if($request->user() == null){
            return response("Insufficient Permissions", 401);
        }
        if(Auth::user()->hasAnyRole('Admin')){
            return $next($request);
        }
       //return redirect('home');
        return response("Insufficient Permissions", 401);
    }
}
