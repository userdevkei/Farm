<?php

namespace App\Http\Middleware;

use Closure;

class Investor
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
        if (auth()->user()->level == 'Investor'){
            return $next($request);
        }
        elseif (auth()->user()->level == 'Officer')
        {
            return redirect('/Officer');
        }
        elseif (auth()->user()->level == 'Farmer')
        {
            return redirect('/Farmer');
        }
        else
        {
            return redirect('/Admin');
        }
    }
}
