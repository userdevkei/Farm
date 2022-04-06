<?php

namespace App\Http\Middleware;

use Closure;

class Officer
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
        if (auth()->user()->level == 'Officer'){
            return $next($request);
        }
        elseif (auth()->user()->level == 'Admin')
        {
            return redirect('/Admin');
        }
        elseif (auth()->user()->level == 'Farmer')
        {
            return redirect('/Farmer');
        }
        else
        {
            return redirect('/Investor');
        }
    }
}
