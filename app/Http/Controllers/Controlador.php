<?php

namespace App\Http\Controllers;

use Illuminate\Filesystem;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Clases\Usuario;
use App\Clases\Fichero;
use Mail;
use PDF;
use Input;

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
     * Funcion que lleva a la vista de loginerror que es cuando se loguea mal un usuario
     * 
     * @param Request $request
     * @return type
     */
    public function loginerror(Request $request) {
        
        return view('Login/loginerror');
    }

    /**
     * Obtiene todos los datos de los roles y le pasa los datos a la vista asignarTareas
     * 
     * @param Request $request
     * @return type
     */
    public function asignarTareas(Request $request) {

        $rol = \DB::table('rol')->get();

        $datos = [
            'roles' => $rol,
                //'id_user' => $usu->getId_usuario()
        ];

        return view('Administrar/asignarTareas', $datos);
    }

   
    /**
     * Funcion que lleva a la vista loginconfirm cuando el usuario esta sin confirmar
     * 
     * @param Request $request
     * @return type
     */
    public function loginconfirm(Request $request) {
        
        return view('Login/loginconfirm');
    }

    /**
     * Funcion que comprueba el login si pasa el middleware login, coje el usuario de la sesion, escribe el log,
     * saca los cargos del usuario y mira si algun cargo es igual a EQ_Directivo o Coordinador calidad
     * en ese caso es administrador y se guarda en la sesion la variable rol.
     * Luego comprueba lo mismo y si es administrador te lleva a una vista llamada elegirRol.
     * Si el usuario no es administrador no entra en ningun if y directamente hacer el return view de gestionTareas
     * pasandole los datos.
     * 
     * @param Request $request
     * @return type
     */
    public function comprobarlogin(Request $request) {

        \Session::put('rol', 'Usuario');
        $usu = new Usuario('', '', '', '', '');
        $usu = \Session::get('u');

        $nombre = $usu->getNombre();
        $apellidos = $usu->getApellidos();

        $log = new Fichero();

        $cargo = \DB::table('cargo')->where('id_usuario', '=', $usu->getId_usuario())->get();


        for ($i = 0; $i < count($cargo); $i++) {
            $rol[] = \DB::table('rol')->where('id_rol', '=', $cargo[$i]->id_rol)->get();

            if ($rol[$i][0]->descripcion == 'EQ_Directivo' || $rol[$i][0]->descripcion == 'Coordinador calidad') {

                \Session::put('rol', 'Administrador');
            }
        }

        for ($i = 0; $i < count($rol); $i++) {

            if ($rol[$i][0]->descripcion == "EQ_Directivo") {

                $log->EscribirLog($nombre . ' ' . $apellidos . ' ha iniciado sesión.');
                return view('Administrar/elegirRol');
                
            }
            else if ($rol[$i][0]->descripcion == "Coordinador calidad") {

                $log->EscribirLog($nombre . ' ' . $apellidos . ' ha iniciado sesión.');
                return view('Administrar/elegirRol');
            }
        }



        $datos = [
            'roles' => $rol,
            'id_user' => $usu->getId_usuario()
        ];


        $log->EscribirLog($nombre . ' ' . $apellidos . ' ha iniciado sesión.');
        

        return view('GestionarTareas/gestionTareas', $datos);
    }

    /**
     * Funcion que lleva a la vista registro cuando el usuario le da a registro en el login
     * 
     * @param Request $request
     * @return type
     */
    public function registro(Request $request) {
        
        return view('Registro/registro');
    }

    
    /**
     * Funcion que lleva a la vista elegirRol cuando el usuario que se registra es un administrador
     * 
     * @return type
     */
    public function elegirRol() {
        
        return view('Administrar/elegirRol');
    }

    /**
     * Funcion que lleva a la vista registroerror cuando el usuario se registra de forma incorrecta
     * 
     * @param Request $request
     * @return type
     */
    public function registroerror(Request $request) {
        
        return view('Registro/registroerror');
    }

    
    /**
     * Funcion que lleva a la vista activarUsuarios cuando el usuario pulsa en el menu activar usuarios
     * 
     * @param Request $request
     * @return type
     */
    public function activarUsuarios(Request $request) {
        
        return view('Administrar/activarUsuarios');
    }

    
    /**
     * Funcion que lleva a la vista administrarUsuarios cuando el usuario pulsa en el menu gestionar usuarios
     * 
     * @param Request $request
     * @return type
     */
    public function administrarUsuarios(Request $request) {
        
        return view('Administrar/administrarUsuarios');
    }

    
    /**
     * Funcion que lleva a la vista verHistorico cuando el usuario pulsa en el menu ver historico en la pagina ver log
     * 
     * @param Request $request
     * @return type
     */
    public function verHistorico(Request $request) {

        return view('Administrar/verHistorico');
    }

    
    /**
     * Funcion que lleva a la vista verLog cuando el usuario pulsa en el menu historico
     * 
     * @param Request $request
     * @return type
     */
    public function verLog(Request $request) {

        return view('Administrar/verLog');
    }

    
    /**
     * Funcion que guarda el log del fichero log.txt al fichero historicoLog.txt
     * 
     * @param Request $request
     * @return type
     */
    public function guardarLog(Request $request) {

        //Cojo el value del botón (todo el texto del textarea)
        $lineas = $request->get('guardarEnHistorico');

        //Lo guardo en el historicoLog.txt y elimino lo que haya en el log.txt
        $log = new Fichero();
        $log->guardarHistorico($lineas);

        //Eliminamos el contenido de log.txt
        $log->eliminarDatosLog();


        return view('Administrar/verLog');
    }

    
    /**
     * Funcion que lleva  la vista gestionTareas cuando el usuario es solamente usuario
     * 
     * @param Request $request
     * @return type
     */
    public function usuario(Request $request) {


        //Cojo el usuario de la sesion
        $usu = new Usuario('', '', '', '', '');
        $usu = \Session::get('u');

        //Guardo en la sesion una varaibale llamada pagina para saber a la pagina que voy
        \Session::put('pagina', 'gestiontareas');


        //Obtengo todos los cargos del usuario
        $cargo = \DB::table('cargo')->where('id_usuario', '=', $usu->getId_usuario())->get();

        //Guardo los cargos en un vector
        for ($i = 0; $i < count($cargo); $i++) {
            $rol[] = \DB::table('rol')->where('id_rol', '=', $cargo[$i]->id_rol)->get();
        }

        //Datos que le paso a la vista
        $datos = [
            'roles' => $rol,
            'id_user' => $usu->getId_usuario()
        ];


        return view('GestionarTareas/gestionTareas', $datos);
    }

    
    /**
     * Funcion que lleva  la vista administrar cuando el usuario es administrador
     * @param Request $request
     * @return type
     */
    public function administrador(Request $request) {

        //Cojo el usuario de la sesion
        $usu = new Usuario('', '', '', '', '');
        $usu = \Session::get('u');

        //Guardo en la sesion una varaibale llamada pagina para saber a la pagina que voy
        \Session::put('pagina', 'administrar');


        //Obtengo todos los roles
        $rol = \DB::table('rol')->get();

        //Obtengo el comentario de los administradores
        $mensajeAdmins = \DB::table('comentarioadmin')->get();

        //Guardo el comentario en una varaible
        $comentarioAdmin = $mensajeAdmins[0]->mensaje;
        
        //Datos que le paso a la vista
        $datos = [
            'roles' => $rol,
            'id_user' => $usu->getId_usuario(),
            'comentarioAdmin' => $comentarioAdmin
        ];
        

        return view('Administrar/administrar', $datos);
    }

    
    /**
     * Funcion que lleva a la vista enviarpassword cuando el usuario le da al enlace del login Has olvidado la contraseña
     * 
     * @param Request $request
     * @return type
     */
    public function enviarpassword(Request $request) {

        return view('Login/enviarpassword');
    }

    
    /**
     * Funcion que lleva a la vista restablecerpassword cuando el usuario pulsa en el enlace que se envia al correo
     * 
     * @param Request $request
     * @return type
     */
    public function restablecerpassword(Request $request) {

        return view('Login/restablecerpassword');
    }
    
    
    /**
     * Funcion que lleva a la vista fotorecortada cuando el usuario le da a guardar cuando ya tiene la foto cargada
     * 
     * @param Request $request
     * @return type
     */
    public function fotorecortada(Request $request) {

        return view('fotorecortada');
    }
    
    
    /**
     * Funcion que lleva a la vista paginainicio cuando el usuario se loguea correctamente o pulsa en el menu Inicio
     * 
     * @param Request $request
     * @return type
     */
    public function paginainicio(Request $request) {

        return view('Login/paginainicio');
    }

    
    /**
     * Funcion que comprueba si la imagen es correcta cuando se pulsa el boton subir del popup
     * 
     * @param Request $request
     * @return type
     */
    public function subirimagen(Request $request) {


        //Cojo el usuario de la sesion
        $usu = new Usuario('', '', '', '', '');
        $usu = \Session::get('u');



        //Si el archivo el valido
        if ($request->hasFile('archivo')) {
            
            
            
            //Si el archivo es jpg
            if ($_FILES['archivo']['type'] == 'image/jpeg') {
                

                //Cojo el archivo del request
                $archivo = $request->file('archivo');
                
                //Cojo el nombre del archivo
                $nombrearchivo = $archivo->getClientOriginalName();


                //Ruta de destino
                $rutadestino = public_path() . '/Imagenes/Fotosusuarios/' . $usu->getId_usuario() . '/';
                $url_image = $archivo->getClientOriginalName();
                $subir = $archivo->move($rutadestino, $archivo->getClientOriginalName());


                //Datos que le paso a la vista
                $datos = [

                    'nombrearchivo' => (string) $nombrearchivo,
                    'id_usuario' => $usu->getId_usuario()
                ];


                return view('subirfoto', $datos);
            }
            //Sino me lleva a la vista subirfotoerror
            else{
                
                
                return view('subirfotoerror');
            }
        }
        //Sino me lleva a la vista subirfotoerror
        else{
            
            return view('subirfotoerror');
        }
    }

    
    /**
     * Funcion que añade un nuevo rol
     * 
     * @param Request $request
     * @return type
     */
    public function nuevorol(Request $request) {



        $nombredelrol = $request->get('nombrerol');

        \DB::table('rol')
                ->insert([
                    'descripcion' => $nombredelrol,
        ]);

        return redirect('gestion');
    }

    
    /**
     * Funcion que añade una nueva categoria
     * 
     * @param Request $request
     * @return type
     */
    public function nuevacategoria(Request $request) {



        $nombrecategoria = $request->get('nombrecategoria');

        \DB::table('categoria')
                ->insert([
                    'descripcion' => $nombrecategoria,
        ]);

        return redirect('gestion');
    }

    
    /**
     * Funcion que añade una nueva entrega
     * 
     * @param Request $request
     * @return type
     */
    public function nuevaentrega(Request $request) {



        $nombreentrega = $request->get('nombreentrega');

        \DB::table('entregar')
                ->insert([
                    'descripcion' => $nombreentrega,
        ]);

        return redirect('gestion');
    }

    
    /**
     * Funcion que lleva a la vista cuando el usuario pulsa en el menu gestion de datos
     * 
     * @param Request $request
     * @return type
     */
    public function gestion(Request $request) {


        //Obtengo todo los roles, categorias y entregar
        $roles = \DB::table('rol')->get();
        $categorias = \DB::table('categoria')->get();
        $entregar = \DB::table('entregar')->get();


        //Datos que le paso a la vista
        $datos = [
            'roles' => $roles,
            'categorias' => $categorias,
            'entregar' => $entregar
        ];

        return view('gestion', $datos);
    }

    
    /**
     * Funcion que lleva a la vista cerrarsesion cuando el usuario cierra sesion en la parte de los datos del usuario
     * 
     * @param Request $request
     * @return type
     */
    public function cerrarsesion(Request $request) {


        //Cojo el usuario de la sesion
        $usu = new Usuario('', '', '', '', '');
        $usu = \Session::get('u');

        //Cojo el nombre y apellidos
        $nombre = $usu->getNombre();
        $apellidos = $usu->getApellidos();

        //Elimino las variables de la sesion
        \Session::forget('u');
        \Session::forget('rol');
        \Session::forget('pagina');

        //Escribe en el log que se ha cerrado sesion
        $log = new Fichero();
        $log->EscribirLog($nombre . ' ' . $apellidos . ' ha cerrado sesión.');



        return view('Login/cerrarsesion');
    }

    
    /**
     * Funcion que lleva a la vista miperfil cuando el usuario le da al boton mi perfil en la parte de los datos del usuario
     * 
     * @param Request $request
     * @return type
     */
    public function miperfil(Request $request) {

        //Cojo el usuario de la sesion
        $usu = new Usuario('', '', '', '', '');
        $usu = \Session::get('u');


        //Datos que le paso a la vista
        $datos = [
            'usuario' => $usu
        ];


        return view('GestionarTareas/miperfil', $datos);
    }

    
    /**
     * Funcion que actualiza los datos del usuario (nombre, apellidos y email) cuando pulso el boton actualizar
     * en la pagina de los datos del perfil del usuario, aqui tambien hay un boton para cambiar la contraseña
     * 
     * @param Request $request
     * @return type
     */
    public function actualizarperfil(Request $request) {


        //Cojo el usuario de la sesion
        $usu = new Usuario('', '', '', '', '');
        $usu = \Session::get('u');


        //Cojo el nombre, apellidos y email
        $nombre = $request->get('nombre');
        $apellidos = $request->get('apellidos');
        $email = $request->get('email');


        //Cojo la fecha actual con getdate
        $hoy = getdate();
        $dia = $hoy['mday'];
        $mes = $hoy['mon'];
        $año = $hoy['year'];


        
        //Actualizo el usuario con lo datos
        \DB::table('usuario')->where('id_usuario', '=', $usu->getId_usuario())->update([
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'email' => $email,
            'updated_at' => $año . '-' . $mes . '-' . $dia
        ]);

        //Actualizo el usuario de la sesion
        $usu->setNombre($nombre);
        $usu->setApellidos($apellidos);
        $usu->setEmail($email);

        //Guardo el usuario en sesion
        \Session::put('usuario', $usu);

        //Datos que le paso a la vista
        $datos = [
            'usuario' => $usu
        ];


        return view('GestionarTareas/miperfilactualizado', $datos);
    }

    
    /**
     * Funcion que lleva a la vista cambiarpasswordperfil cuando el usuario pulsa el boton cambiar contraseña actual
     * en la pagina del perfil del usuario
     * 
     * @param Request $request
     * @return type
     */
    public function passwordperfil(Request $request) {

        return view('GestionarTareas/cambiarpasswordperfil');
    }

    
    /**
     * Funcion que cambia la contraseña del usuario cuando se pulsa el boton actualziar contraseña
     * 
     * @param Request $request
     * @return type
     */
    public function cambiarpasswordperfil(Request $request) {


        //Cojo el usuario de la sesion
        $usu = new Usuario('', '', '', '', '');
        $usu = \Session::get('u');

        //cojo la contraseña antigua y la nueva
        $contraseñaantigua = $request->get('contraseñaantigua');
        $password = $request->get('password');

        //Comprueba si la contraseña antigua es igual a la contraseña del usuario de la sesion
        if (\Hash::check($contraseñaantigua, $usu->getPassword())) {



            //Actualizo la contraseña
            \DB::table('usuario')->where('id_usuario', '=', $usu->getId_usuario())->update([
                'password' => \Hash::make($password)
            ]);
        }



        return view('GestionarTareas/cambiarpasswordperfil');
    }

    
    /**
     * Funcion que restablece la contraseña
     * 
     * @param Request $request
     * @return type
     */
    public function restablecer(Request $request) {


        //Cojo el email y la contraseña
        $email = $request->get('email');
        $password = $request->get('password');



        //Obtengo todos los datos del usuario por el email
        $correorestablecer = \DB::table('usuario')->where('email', '=', $email)->get();

        
        //Si existe el email cambio la contraseña
        if ($correorestablecer) {


            \DB::table('usuario')->where('email', '=', $email)->update([
                'password' => \Hash::make($password)
            ]);
        }

        return view('Login/login');
    }
    
    
    /**
     * Funcion que envia un correo electronico al usuario y lleva a la vista confirmacioncorreo
     * 
     * @param Request $request
     * @return type
     */
    public function enviarcorreo(Request $request) {

        
        //Cojo el email que ha puesto el usuario y el email de origen
        $email = $request->get('email');
        $emailorigen = "proyectoadndaw@gmail.com";


        //Datos que se le pasa a la vista que se va a mostrar en el correo
        $data = [
            'email' => $email
        ];


        //Envia el email cargando la vista correoenviado pasandole los datos con un asunto y un mensaje
        Mail::send('Login/correoenviado', $data, function($message) {


            $message->to($_POST['email'], "Proyectoadn")->subject('Cambio de contraseña');

            $message->from('proyectoadndaw@gmail.com', 'Administrador');
        });

        return view('Login/confirmacioncorreo', $data);
    }

    
    /**
     * Funcion que confirma al usuario que se ha registrado
     * 
     * @param Request $request
     * @return type
     */
    public function enviarconfirm(Request $request) {

        //Cojo el id
        $id = $request->get('validar');

        //Cojo el usario de la base de datos por el id
        $usuario = \DB::table('usuario')->where('id_usuario', '=', $id)->get();
        
        //Cojo el nombre y el email
        $nombre = $usuario[0]->nombre;
        $email = $usuario[0]->email;
        
        //Actualizo el usuario por su id y se pone confirmado a 1 que significa que esta activado
        \DB::table('usuario')->where('id_usuario', '=', $id)->update([
            'confirmado' => -1
        ]);
        
        
        //Datos que le paso a la vista
        $data = [
            'email' => $email,
            'nombre' => $nombre
        ];


        //Envia el email cargando la vista correoconfirm pasandole los datos con un asunto y un mensaje
        Mail::send('Administrar/correoconfirm', $data, function($message) {

            //Cojo el id
            $id = $_POST['validar'];

            //Cojo el usuario por el id
            $usuario = \DB::table('usuario')->where('id_usuario', '=', $id)->get();

            //Cojo el email
            $email = $usuario[0]->email;

            $message->to($email, "Proyectoadn")->subject('Validacion de usuario');

            $message->from('proyectoadndaw@gmail.com', 'Administrador');
        });

        return view('Administrar/activarUsuarios');
    }

    
    
    /**
     * Funcion que obtiene los datos del centro y carga la vista datosCentro
     * 
     * @param Request $request
     * @return type
     */
    public function datoscentro(Request $request) {

        //Obtiene los datos del centro de la base de datos
        $datoscentro = \DB::table('datoscentro')->get();

        //Cojo los datos
        $direccion = $datoscentro[0]->direccion;
        $codigopostal = $datoscentro[0]->codigopostal;
        $ciudad = $datoscentro[0]->ciudad;
        $provincia = $datoscentro[0]->provincia;
        $telefono = $datoscentro[0]->telefono;
        $fax = $datoscentro[0]->fax;
        $email1 = $datoscentro[0]->email1;
        $email2 = $datoscentro[0]->email2;
        $codigocentro = $datoscentro[0]->codigocentro;

        //Datos que le paso a la vista
        $datos = [
            'direccion' => $direccion,
            'codigopostal' => $codigopostal,
            'ciudad' => $ciudad,
            'provincia' => $provincia,
            'telefono' => $telefono,
            'fax' => $fax,
            'email1' => $email1,
            'email2' => $email2,
            'codigocentro' => $codigocentro
        ];

        return view('GestionarTareas/datosCentro', $datos);
    }

    
    
    /**
     * Funcion que visualiza los datos del centro y carga la vista datosCentroVisualizar
     * 
     * @param Request $request
     * @return type
     */
    public function datosCentroVisualizar(Request $request) {

        $datoscentro = \DB::table('datoscentro')->get();

        $direccion = $datoscentro[0]->direccion;
        $codigopostal = $datoscentro[0]->codigopostal;
        $ciudad = $datoscentro[0]->ciudad;
        $provincia = $datoscentro[0]->provincia;
        $telefono = $datoscentro[0]->telefono;
        $fax = $datoscentro[0]->fax;
        $email1 = $datoscentro[0]->email1;
        $email2 = $datoscentro[0]->email2;
        $codigocentro = $datoscentro[0]->codigocentro;

        $datos = [
            'direccion' => $direccion,
            'codigopostal' => $codigopostal,
            'ciudad' => $ciudad,
            'provincia' => $provincia,
            'telefono' => $telefono,
            'fax' => $fax,
            'email1' => $email1,
            'email2' => $email2,
            'codigocentro' => $codigocentro
        ];

        return view('GestionarTareas/datosCentroVisualizar', $datos);
    }

    
    /**
     * Funcion que activa al usuario
     * 
     * @param Request $request
     * @return type
     */
    public function activar(Request $request) {

        //Cojo el email del usuario
        $email = $request->get('correo');

        //Actualizo el usuario y le pongo confirmado a 1 que es cuando esta activado
        \DB::table('usuario')->where('email', '=', $email)->update([
            'confirmado' => 1
        ]);
        
        return view('Login/usuarioActivado');
    }

    
    /**
     * Funcion que actualiza los datos del centro
     * 
     * @param Request $request
     * @return type
     */
    public function actualizarDatosCentro(Request $request) {

        $direccion = $request->get('direccion');
        $codigopostal = $request->get('codigopostal');
        $ciudad = $request->get('ciudad');
        $provincia = $request->get('provincia');
        $telefono = $request->get('telefono');
        $fax = $request->get('fax');
        $email1 = $request->get('email1');
        $email2 = $request->get('email2');
        $codigocentro = $request->get('codigocentro');


        \DB::table('datoscentro')->where('id_datoscentro', '=', '1')->update([
            'direccion' => $direccion,
            'codigopostal' => $codigopostal,
            'ciudad' => $ciudad,
            'provincia' => $provincia,
            'telefono' => $telefono,
            'fax' => $fax,
            'email1' => $email1,
            'email2' => $email2,
            'codigocentro' => $codigocentro,
        ]);

        $datos = [
            'direccion' => $direccion,
            'codigopostal' => $codigopostal,
            'ciudad' => $ciudad,
            'provincia' => $provincia,
            'telefono' => $telefono,
            'fax' => $fax,
            'email1' => $email1,
            'email2' => $email2,
            'codigocentro' => $codigocentro
        ];


        return view('GestionarTareas/datosCentroActualizado', $datos);
    }

    
    /**
     * Funcion que hace un insert cuando un usuario se registra
     * 
     * @param Request $request
     * @return type
     */
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
