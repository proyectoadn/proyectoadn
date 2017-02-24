<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Clases\Usuario;
use Mail;
use Crypt;

class Controlador extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('Login/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function loginerror(Request $request) {
        return view('Login/loginerror');
    }

    public function asignarTareas(Request $request) {

        $rol = \DB::table('rol')->get();

        $datos = [
            'roles' => $rol,
            //'id_user' => $usu->getId_usuario()
        ];
        
        return view('Administrar/asignarTareas', $datos);
    }

    public function loginconfirm(Request $request) {
        return view('Login/loginconfirm');
    }

    public function comprobarlogin(Request $request) {


        $usu = new Usuario('', '', '', '', '');
        $usu = \Session::get('u');


        $cargo = \DB::table('cargo')->where('id_usuario', '=', $usu->getId_usuario())->get();

        for ($i = 0; $i < count($cargo); $i++) {
            $rol[] = \DB::table('rol')->where('id_rol', '=', $cargo[$i]->id_rol)->get();
        }

        for ($i = 0; $i < count($rol); $i++) {

            if ($rol[$i][0]->descripcion == "EQ_Directivo") {

                return view('Administrar/elegirRol');
            } else if ($rol[$i][0]->descripcion == "Coordinador calidad") {

                return view('Administrar/elegirRol');
            }
        }

        $datos = [
            'roles' => $rol,
            'id_user' => $usu->getId_usuario()
        ];

        return view('GestionarTareas/gestionTareas', $datos);
    }

    public function registro(Request $request) {
        return view('Registro/registro');
    }

    public function registroerror(Request $request) {
        return view('Registro/registroerror');
    }
    
        public function activarUsuarios(Request $request) {
        return view('Administrar/activarUsuarios');
    }


    public function administrarUsuarios(Request $request) {
        return view('Administrar/administrarUsuarios');
    }

    public function usuario(Request $request) {


        $usu = new Usuario('', '', '', '', '');
        $usu = \Session::get('u');

        \Session::put('rol', 'Usuario');

        $cargo = \DB::table('cargo')->where('id_usuario', '=', $usu->getId_usuario())->get();
        
        for ($i = 0; $i < count($cargo); $i++) {
            $rol[] = \DB::table('rol')->where('id_rol', '=', $cargo[$i]->id_rol)->get();
        }

        $datos = [ 
           'roles' => $rol,
            'id_user' => $usu->getId_usuario()
        ];

        return view('GestionarTareas/gestionTareas', $datos);
    }

    public function administrador(Request $request) {

        $usu = new Usuario('', '', '', '', '');
        $usu = \Session::get('u');

        \Session::put('rol', 'Administrador');

        $rol = \DB::table('rol')->get();

        $mensajeAdmins = \DB::table('comentarioAdmin')->get();

         $comentarioAdmin= $mensajeAdmins[0]->mensaje;
        $datos = [
            'roles' => $rol,
            'id_user' => $usu->getId_usuario(),
            'comentarioAdmin' => $comentarioAdmin
        ];

        return view('Administrar/administrar', $datos);
    }

    public function enviarpassword(Request $request) {

        return view('Login/enviarpassword');
    }

    public function restablecerpassword(Request $request) {

        return view('Login/restablecerpassword');
    }
    
    public function cerrarsesion(Request $request) {
        
        
        \Session::forget('u');
        \Session::forget('rol');
        

        return view('Login/cerrarsesion');
    }
    
    public function miperfil(Request $request) {
        
        $usu = new Usuario('', '', '', '', '');
        $usu = \Session::get('u');
        
        
        $datos = [
            
            'usuario' => $usu
        ];
        

        return view('GestionarTareas/miperfil', $datos);
    }
    
    public function actualizarperfil(Request $request) {
        
        
        $usu = new Usuario('', '', '', '', '');
        $usu = \Session::get('u');
        
        
        $nombre = $request->get('nombre');
        $apellidos = $request->get('apellidos');
        $email = $request->get('email');
        
        
        $hoy = getdate();
        $dia = $hoy['mday'];
        $mes = $hoy['mon'];
        $año = $hoy['year'];
        
        
        \DB::table('usuario')->where('id_usuario', '=' , $usu->getId_usuario())->update([
            
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'email' => $email,
            'updated_at' => $año . '-' . $mes . '-' . $dia
            
        ]);
        
        $usu->setNombre($nombre);
        $usu->setApellidos($apellidos);
        $usu->setEmail($email);
        
        \Session::put('usuario', $usu);
        
        $datos = [
            
            'usuario' => $usu
        ];
        
        
        return view('GestionarTareas/miperfilactualizado', $datos);
    }
    
    public function passwordperfil(Request $request) {
        
        return view('GestionarTareas/cambiarpasswordperfil');
    }
    
    public function cambiarpasswordperfil(Request $request) {
        
        
        $usu = new Usuario('', '', '', '', '');
        $usu = \Session::get('u');
        
        $contraseñaantigua = $request->get('contraseñaantigua');
        $password = $request->get('password');
        
        if(\Hash::check($contraseñaantigua, $usu->getPassword())){
            
            
            
            \DB::table('usuario')->where('id_usuario','=', $usu->getId_usuario())->update([
                
                'password' => \Hash::make($password)
            ]);
        }
        
        
        
        return view('GestionarTareas/cambiarpasswordperfil');
    }

    public function restablecer(Request $request) {


        $email = $request->get('email');
        $password = $request->get('password');



        $correorestablecer = \DB::table('usuario')->where('email', '=', $email)->get();

        if ($correorestablecer) {


            \DB::table('usuario')->where('email', '=', $email)->update([

                'password' => \Hash::make($password)
            ]);
        }

        return view('Login/login');
    }

    public function enviarcorreo(Request $request) {

        $email = $request->get('email');
        $emailorigen = "proyectoadndaw@gmail.com";


        $data = [

            'email' => $email
        ];


        Mail::send('Login/correoenviado', $data, function($message) {


            $message->to($_POST['email'], "Proyectoadn")->subject('Cambio de contraseña');

            $message->from('proyectoadndaw@gmail.com', 'Administrador');
        });

        return view('Login/confirmacioncorreo', $data);
    }

    public function enviarconfirm(Request $request) {

        $id = $request->get('validar');

        $usuario = \DB::table('usuario')->where('id_usuario', '=', $id)->get();
        $nombre=$usuario[0]->nombre;
        $email=$usuario[0]->email;
        \DB::table('usuario')->where('id_usuario', '=', $id)->update([

            'confirmado' => -1
        ]);
        $data = [

            'email' => $email,
            'nombre' => $nombre
        ];


        Mail::send('Administrar/correoconfirm', $data, function($message) {

           $id= $_POST['validar'];

            $usuario = \DB::table('usuario')->where('id_usuario', '=', $id)->get();

            $email=$usuario[0]->email;

            $message->to($email, "Proyectoadn")->subject('Validacion de usuario');

            $message->from('proyectoadndaw@gmail.com', 'Administrador');
        });

        return view('Administrar/activarUsuarios');
    }

    public function activar(Request $request) {

    $email=$request->get('correo');

        \DB::table('usuario')->where('email', '=', $email)->update([

            'confirmado' => 1
        ]);
        return view('Login/usuarioActivado');
    }


    public function registrar(Request $request) {
        
        $usu = new Usuario('', '', '', '', '');
        $usu = \Session::get('u');
        
        
        $nombre = $request->get('nombre');
        $apellidos = $request->get('apellidos');
        $email = $request->get('email');
        $password = $request->get('password');

        //Con estas variables creamos la fecha dia, mes y año para meterlo en la BBDD
        $hoy = getdate();
        $dia = $hoy['mday'];
        $mes = $hoy['mon'];
        $año = $hoy['year'];

        //Hacemos el insert
        \DB::table('usuario')
                ->insert([
                    'nombre' => $nombre,
                    'apellidos' => $apellidos,
                    'email' => $email,
                    'password' => \Hash::make($password),
                    'created_at' => $año . '-' . $mes . '-' . $dia,
                    'updated_at' => $año . '-' . $mes . '-' . $dia
        ]);
        

        $usuario = \DB::table('usuario')->where('email', '=', $email)->get();
        
        
        $usu = new Usuario($usuario[0]->id_usuario, $usuario[0]->nombre, $usuario[0]->apellidos, $usuario[0]->email, $usuario[0]->password);


        
        \DB::table('cargo')
                ->insert([
                    'id_usuario' => $usuario[0]->id_usuario,
                    'id_rol' => 7
        ]);

        \Session::put('u', $usu);


        //Volvemos a la página de login
        return view('Registro/registrocorrecto');
    }

}
