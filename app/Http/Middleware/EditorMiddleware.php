<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EditorMiddleware
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

/*3 metodos añadidos en User.php*/
        
       /* $request->user()->authorizeRoles(['Editor']);
        return view('newsEdit');
   
    */


 

 if(is_null(Auth::user())){  
    redirect('/login');

 }
else{
    if ( ! $request->user()->hasRole('Editor')) {
        abort(403, "No tienes autorización para ingresar.");
    }


}

//return redirect('/newsEdit'); /*$next($request); */

return $next($request);

}
}
