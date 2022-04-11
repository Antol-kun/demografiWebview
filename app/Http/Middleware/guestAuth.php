<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GuestAuth
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
        if (auth()->guest()) {
            return $next($request);
        } else {
            if (auth()->user()->nama_akses === 'Admin') {
                return redirect()->route('dashboard');
            }else{
                return redirect()->route('cok');
            }

        }

    }
}
