<?php

namespace App\Http\Middleware;

use Closure;
//use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
class NoticiasMiddleware
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


        //comprobamos que sea un usuario logueado el que intenta acceder a la ruta
        if (Auth::check()==null){//! $request->user()->hasRole('User') or ! $request->user()->hasRole('Admin')){  ) {
            abort(403, "No tienes autorización para ingresar , por favor logueate.");
        }


        return $next($request);

    }
}
