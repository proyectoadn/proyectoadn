<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Controlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loginerror(Request $request)
    {
        
        return view('loginerror');
    }
    
    
    public function comprobarlogin(Request $request){
        
        
        $usu = \Session::get('u');
        
        
        $cargo = \DB::table('cargo')->where('id_usuario','=', $usu[0]->id_usuario)->get();
        
        $rol = \DB::table('rol')->where('id_rol','=', $cargo[0]->id_rol)->get();
        
        
        
        if($rol[0]->descripcion == "EQ_Directivo"){
            
            return view('elegirRol');
        }
        else if($rol[0]->descripcion == "Coordinador calidad"){
            
            return view('elegirRol');
        }
        else{

            return view('gestionTareas');
        }
    }
    public function gestionarTareas(Request $request){
        $usuario=\Session::get('u');

        $datos=[
            'user'=>$usuario
        ];
        return view('gestionarTareas',$datos);
    }

}
