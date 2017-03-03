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
                        ->select('tarea.id_tarea', 'tarea.descripcion', 'tarea.id_estado', 'documentacion.modelo', 'documentacion.link')
                        ->orderby('id_estado', 'asc')->get();
        
        $porhacer = [];
        $pendiente = [];
        $hecho = [];
        
        
        for($i=0;$i<count($tareas);$i++){
            
            if($tareas[$i]->id_estado == 1){
                
                $porhacer[] = $tareas[$i];
            }
            else if($tareas[$i]->id_estado == 2){
                
                $pendiente[] = $tareas[$i];
            }
            else if($tareas[$i]->id_estado == 3){
                
                $hecho[] = $tareas[$i];
            }
        }



        $datos = [
            
            'porhacer' => $porhacer,
            'pendiente' => $pendiente,
            'hecho' => $hecho
        ];



        $pdf = PDF::loadView('pdf', $datos);
        return $pdf->download('archivo.pdf');
    }

}
