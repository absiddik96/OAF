<?php

namespace App\Http\Middleware;

use Auth;
use Session;
use Closure;

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

        if (!Auth::user()->is_admin) {
            Session::flash('info', "You don't have permission to perform this action");
            return redirect()->back();
        }
        return $next($request);
    }
}
