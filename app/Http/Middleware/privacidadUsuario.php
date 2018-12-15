
<?php

namespace Sv\Http\Middleware;

use Closure;

class verificausuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function privacidadUsuario($request, Closure $next)
    {
    	no lo estoy usando
        if (\Sv\Usuarios::mi('id') ) {
          return $next($request);  
        }
        return redirect('login')->with('mensaje','Necesitas iniciar sesion primero');
        
    }
}
