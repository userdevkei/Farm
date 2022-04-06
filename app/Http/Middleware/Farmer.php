<?php

namespace App\Http\Middleware;

use Closure;

class Farmer
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
        if (auth()->user()->level == 'Farmer'){
            return $next($request);
        }
        elseif (auth()->user()->level == 'Officer')
        {
            return redirect('/Officer');
        }
        elseif (auth()->user()->level == 'Admin')
        {
            return redirect('/Admin');
        }
        else
        {
            return redirect('/Investor');
        }
    }
}
