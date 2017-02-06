<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of Conexion
 *
 * @author DAW2
 */
class Conexion {

    private $conex;
    private $cursor;
    private $fila;

    /**
     * Conexion constructor.
     */
    public function __construct()
    {
    }


    function conectar() {
        $this->conex = mysqli_connect('127.0.0.1','proyectoadn', 'proyectoadn', 'proyectoadn');
        $todobien=true;
        if (mysqli_connect_errno($this->conex)) {
            $todobien=false;
        }
        return $todobien;
    }

    function rellenar_categorias($rol) {
        $consult='Select DISTINCT categoria.id_categoria, categoria.descripcion from documentacion,categoria where documentacion.id_rol='.$rol.' and documentacion.id_categoria=categoria.id_categoria';

        $this->cursor = mysqli_query($this->conex, $consult);
        
        if ($this->cursor) {
            $devolver = true;
        } else{
            $devolver = false;
        }
        return $devolver;
    }

    function rellenar_tareas($id_cat, $id_rol, $id_user) {
        $consult='Select tarea.id_tarea, tarea.descripcion, tarea.id_estado, documentacion.modelo from documentacion, tarea where documentacion.id_categoria='.$id_cat.' and documentacion.id_rol='.$id_rol.' and documentacion.id_documentacion=tarea.id_documentacion and tarea.id_usuario='.$id_user;

        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else{
            $devolver = false;
        }
        return $devolver;
    }

    function rellenar_estado($consult) {
        
        $this->cursor = mysqli_query($this->conex, $consult);
        
        if ($this->cursor) {
            $devolver = true;
        } else{
            $devolver = false;
        }
        return $devolver;
    }
    
    function actualizar_estado($consult) {
        
        $this->cursor = mysqli_query($this->conex, $consult);
        
        if ($this->cursor) {
            $devolver = true;
        } else{
            $devolver = false;
        }
        return $devolver;
    }

    function ir_Siguiente() {
        return $this->fila = mysqli_fetch_array($this->cursor);
    }

    function obtener_campo($campo) {
        return $this->fila[$campo];
    }

    function cerrar_Conexion() {
        mysqli_free_result($this->cursor);
        mysqli_close($this->conex);
    }
    function insertar($val1,$val2,$val3){
        $query = "INSERT INTO personas (DNI, Nombre, Tfno) VALUES (?,?,?)"; //Estos parametros seran sustituidos mas adelante por valores.
        $stmt = mysqli_prepare($this->conex, $query);

        mysqli_stmt_bind_param($stmt, "sss", $val1, $val2, $val3);


        /* Ejecución de la sentencia. */
        mysqli_stmt_execute($stmt);
    }
    function borrar($dni){
        $query = "DELETE FROM personas WHERE DNI ='".$dni."'";
        mysqli_query($this->conex, $query);
    }
    function modificar($dniviejo,$dninuevo){
        $query = "update personas set DNI='".$dninuevo."' where DNI='".$dniviejo."'";
        mysqli_query($this->conex, $query);
    }

}
