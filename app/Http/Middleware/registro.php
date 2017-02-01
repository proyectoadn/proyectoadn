<?php

namespace App\Http\Middleware;

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
        
        if($usu){
            return redirect('registroerror');
        }
        
    }

}
