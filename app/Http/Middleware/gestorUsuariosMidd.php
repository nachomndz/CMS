<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class gestorUsuariosMidd
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



        if ( (Auth::check()==null) || ! $request->user()->hasRole('Admin') ) {
            abort(403, "No tienes autorización para ingresar,debes ser administrador. Serás redirigido.");
           
        }

        
        return $next($request);
    }
}
