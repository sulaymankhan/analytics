<?php

namespace sulaymankhan\analytics\Http\Middleware;

use Closure;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {

//dd($role);
        if($request->user()== null || $role != $request->user()->role){

            \Auth::logout();
            dd('loggedOout');
            return redirect('/login');

        }
    
        return $next($request);
    }
}
