<?php

namespace App\Http\Middleware;

use Closure;
use App\Clases\Usuario;

class login
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

        $usuario = $request->get('usuario');
        $password = $request->get('password');


        $usu = \DB::table('usuario')->where('email','=', $usuario)->get();


        if($usu){
            if(!$usu[0]->confirmado){
                return redirect('loginconfirm');
            }
            else if(\Hash::check($password, $usu[0]->password)){
                
                $usuariosesion = new \Usuario($usu[0]->id_usuario, $usu[0]->nombre, $usu[0]->apellidos, $usu[0]->email, $usu[0]->password);
                
                \Session::put('u', $usuariosesion);

                return $next($request);
            }
            else{

                return redirect('loginerror');
            }
        }
        else{

            return redirect('loginerror');
        }
    }
}
