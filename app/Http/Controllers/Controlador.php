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

        /*
        \DB::table('usuario')->insert([

            'nombre' => "Daniel",
            'apellidos' => 'ramirez ros',
            'email' => 'dramirez677@gmail.com',
            'password' => \Hash::make("dani"),
            'created_at' => getdate(),
            'updated_at' => getdate(),
        ]);
        */


        return view('login');
    }
    
        public function loginerror()
    {

        return view('loginerror');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
}
