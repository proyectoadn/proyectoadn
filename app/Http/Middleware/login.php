<?php

namespace App\Http\Middleware;

use Closure;

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

            if(\Hash::check($usu[0]->password, $password)){

                \Session::put('u', $usu);

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
