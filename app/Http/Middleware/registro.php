<?php

namespace App\Http\Middleware;

use App\Clases\Usuario;
use Closure;


class registro {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

        $email = $request->get('email');

        $usu = \DB::table('usuario')->where('email', '=', $email)->get();

        if ($usu) {
            
            return redirect('registroerror');
        } 
        else {

            $nombre = $request->get('nombre');
            $apellidos = $request->get('apellidos');
            $password = $request->get('password');

            $passw=\Hash::make($password);
            
            //id_usuario, nombre, apellidos, email, password
            $oUsuario = new Usuario('', $nombre, $apellidos, $email, $passw);
            \Session::put('u', $oUsuario); 
            return $next($request);
        }
    }

}
