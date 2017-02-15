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

    function rellenar_todas_categorias() {
        $consult='Select * from categoria';

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

    function rellenar_documentacion($id_cat, $id_rol) {
        $consult='Select * from documentacion where id_categoria='.$id_cat.' and id_rol='.$id_rol;

        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else{
            $devolver = false;
        }
        return $devolver;
    }

    function rellenar_comentario($id_tarea) {
        $consult='Select mensaje from comentario where id_tarea='.$id_tarea;

        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else{
            $devolver = false;
        }
        return $devolver;
    }

    function rellenar_documento($id_docu) {
        $consult='Select * from documentacion where id_documentacion='.$id_docu;

        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else{
            $devolver = false;
        }
        return $devolver;
    }

    function rellenar_textotarea($id_tarea) {
        $consult='Select descripcion from  tarea where id_tarea='.$id_tarea;

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

    function rellenar_roles() {

        $consult='Select * from  rol';
        $this->cursor = mysqli_query($this->conex, $consult);
        if ($this->cursor) {
            $devolver = true;
        } else{
            $devolver = false;
        }
        return $devolver;
    }

    function rellenar_entregar() {

        $consult='Select * from  entregar';
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

    function cerrar_Conexion2() {
        mysqli_close($this->conex);
    }

    function insertar($val1,$val2,$val3){
        $query = "INSERT INTO personas (DNI, Nombre, Tfno) VALUES (?,?,?)"; //Estos parametros seran sustituidos mas adelante por valores.
        $stmt = mysqli_prepare($this->conex, $query);

        mysqli_stmt_bind_param($stmt, "sss", $val1, $val2, $val3);


        /* Ejecución de la sentencia. */
        mysqli_stmt_execute($stmt);
    }

    function insert_comentario($texto,$id){
        $consult='Select * from comentario where id_tarea='.$id;

        $this->cursor = mysqli_query($this->conex, $consult);

       if($this->ir_Siguiente()){
           $query = "update comentario set mensaje='".$texto."' where id_tarea=".$id;
           mysqli_query($this->conex, $query);
       }
        else{
            $query = "INSERT INTO comentario (id_tarea, mensaje) VALUES (?,?)"; //Estos parametros seran sustituidos mas adelante por valores.
            $stmt = mysqli_prepare($this->conex, $query);

            mysqli_stmt_bind_param($stmt, "is", $id, $texto);


            /* Ejecución de la sentencia. */
            mysqli_stmt_execute($stmt);
        }

    }


    function borrar_documentacion($id){
        $query = "DELETE FROM documentacion WHERE id_documentacion =".$id;
        mysqli_query($this->conex, $query);
    }

    function modificar($dniviejo,$dninuevo){
        $query = "update personas set DNI='".$dninuevo."' where DNI='".$dniviejo."'";
        mysqli_query($this->conex, $query);
    }

    function update_documento($descripcion,$id_categoria,$id_rol, $id_entregar, $modelo,$id_doc){
        $query = "update documentacion set descripcion='".$descripcion."', modelo='".$modelo."',id_rol='".$id_rol."',id_entregar='".$id_entregar."',id_categoria='".$id_categoria."' where id_documentacion='".$id_doc."'";
        mysqli_query($this->conex, $query);
    }

}
