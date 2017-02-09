<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Clases\Usuario;
use Mail;

class Controlador extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Login/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function loginerror(Request $request)
    {
        return view('Login/loginerror');
    }

    public function loginconfirm(Request $request)
    {
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

    public function registro(Request $request)
    {
        return view('Registro/registro');
    }

    public function registroerror(Request $request)
    {
        return view('Registro/registroerror');
    }

    public function usuario(Request $request) {


        $usu = new Usuario('', '', '', '', '');
        $usu = \Session::get('u');

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

        return view('Administrar/administrar');
    }

    public function enviarpassword(Request $request) {

        return view('Login/enviarpassword');
    }
    
    public function restablecerpassword(Request $request) {

        return view('Login/restablecerpassword');
    }
    
    public function restablecer(Request $request) {
        
        
        $email = $request->get('email');
        $password = $request->get('password');
        
        
        
        $correorestablecer = \DB::table('usuario')->where('email','=', $email)->get();
        
        if($correorestablecer){
            
            
            \DB::table('usuario')->where('email','=', $email)->update([
                
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

    public function registrar(Request $request) {

        //Creo el usuario en blanco y lo recojo de la sesión
        $usu = new Usuario('', '', '', '', '');
        $usu = \Session::get('u');

        //Con estas variables creamos la fecha dia, mes y año para meterlo en la BBDD
        $hoy = getdate();
        $dia = $hoy['mday'];
        $mes = $hoy['mon'];
        $año = $hoy['year'];

        //Hacemos el insert
        \DB::table('usuario')
                ->insert([
                    'nombre' => $usu->getNombre(),
                    'apellidos' => $usu->getApellidos(),
                    'email' => $usu->getEmail(),
                    'password' => $usu->getPassword(),
                    'created_at' => $año . '-' . $mes . '-' . $dia,
                    'updated_at' => $año . '-' . $mes . '-' . $dia
        ]);

        $usuario = \DB::table('usuario')->where('email', '=', $usu->getEmail())->get();


        \DB::table('cargo')
                ->insert([
                    'id_usuario' => $usuario[0]->id_usuario,
                    'id_rol' => 7
        ]);

        $usu->setId_usuario($usuario[0]->id_usuario);
        \Session::put('u', $usu);


        //Volvemos a la página de login
        return view('Registro/registrocorrecto');
    }

}
