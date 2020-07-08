<?php

namespace App\Http\Middleware;

use Closure;

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



        if (! $request->user()->hasRole('Admin')) {
            abort(403, "No tienes autorización para ingresar,debes ser administrador.");
        }
        return $next($request);
    }
}
