<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Dompdf\Dompdf;

class Controladorpdf extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    public function store(Request $request) {

        $dompdf = new Dompdf();
        $dompdf->loadHtml('hello world');
        
        $dompdf->render();
        //$dompdf->stream();
        
    }

}
