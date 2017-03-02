<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use App\Clases\Usuario;
use PDF;

class Controladorpdf extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    public function pdf(Request $request) {

        $usu = new Usuario('', '', '', '', '');
        $usu = \Session::get('u');



        $cargo = $request->get('carg');

        $idcategoria = $request->get('cat');


        $rol = \DB::table('rol')->where('id_rol', '=', $cargo)->get();

        $idrol = $rol[0]->id_rol;


        $idusuario = $usu->getId_usuario();




        $tareas = \DB::table('documentacion')->join('tarea', 'tarea.id_documentacion', '=', 'documentacion.id_documentacion')
                        ->where('documentacion.id_categoria', '=', $idcategoria)
                        ->where('documentacion.id_rol', '=', $idrol)
                        ->where('tarea.id_usuario', '=', $idusuario)
                        ->select('tarea.id_tarea', 'tarea.descripcion', 'tarea.id_estado', 'documentacion.modelo', 'documentacion.link')->get();
        
        
        
        $datos = [
            
            'tareas' => $tareas
        ];



        $pdf = PDF::loadView('pdf', $datos);
        return $pdf->download('invoice.pdf');
    }

}
