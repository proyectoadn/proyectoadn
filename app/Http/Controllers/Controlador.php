<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Clases\Usuario;

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
    public function loginconfirm(Request $request)
    {
        return view('loginconfirm');
    }

    public function comprobarlogin(Request $request){
        
        
        $usu = new Usuario('','','','','');
        $usu = \Session::get('u');
        
        
        $cargo = \DB::table('cargo')->where('id_usuario','=', $usu->getId_usuario())->get();
        
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

    }

    public function registro(Request $request){
        
        return view('registro');
    }

    public function usuario(Request $request){


        $usu = new Usuario('','','','','');
        $usu=\Session::get('u');
        $user[] = $usu->getId_usuario();
        $user[] = $usu->getNombre();
        $user[] = $usu->getEmail();
        $user[] = $usu->getPassword();
        $usuario=json_encode($user);
        $cargo = \DB::table('cargo')->where('id_usuario','=', $usu->getId_usuario())->get();
        for($i=0;$i<count($cargo);$i++){
            $rol[] = \DB::table('rol')->where('id_rol','=', $cargo[$i]->id_rol)->get();
        }

        $datos=[
            'roles'=>$rol
        ];

        return view('gestionTareas',$datos);
    }

    public function administrador(Request $request){


        return view('administrar');
    }
    
    public function registrar(Request $request){
        
        //Hacer el insert del registro
    }
}
