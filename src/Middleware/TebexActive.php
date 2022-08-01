<?php

namespace Azuriom\Plugin\Tebex\Middleware;

use Closure;
use Illuminate\Http\Request;

class TebexActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(tebexMode()){
            if(plugins()->isEnabled('shop')) {
                plugins()->disable('shop');
            }

            return $next($request);
        } else {
            
            abort(404);
        }
    }
} 
