<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Admin
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
        //Check if the user has the permission to access particular route?
        // If user is not admin , reroute them somewhere else
        if(Auth::user()->isAdmin == 0)
        {
            Session::flash('info','You do not have permission to perform this action');
            return redirect()->back();  
        }

        //This permits to go on
        return $next($request);
    }
}
