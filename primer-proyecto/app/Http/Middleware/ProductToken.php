<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProductToken
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
        /* Sí no hay token ingresado, entonces redirecciónalo (Kernel) */
        if(!$request->has('token') || $request->token != '123'){ 
            return redirect(route('sin_token'));
        }
        return $next($request);
    }
}
