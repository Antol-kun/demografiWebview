<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class staff
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
        if (Auth()->guest()) {
           return redirect('/');

        } else {
            if (auth()->user()->nama_akses != 'Admin') {
                return $next($request);
            } else  if (auth()->user()->nama_akses == 'Admin') {
                return redirect('/');
            }else {
                return redirect('/');
            }
        }
        // return $next($request);
    }
}
