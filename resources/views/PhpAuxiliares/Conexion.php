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
    private $cursor2;
    private $fila;
    private $fila2;

    /**
     * Conexion constructor.
     */
    public function __construct() {
        
    }

    function conectar() {
        $this->conex = mysqli_connect('127.0.0.1', 'proyectoadn', 'proyectoadn', 'proyectoadn');
        $todobien = true;
        if (mysqli_connect_errno($this->conex)) {
            $todobien = false;
        }
        return $todobien;
    }


    /**
     * Funcion que devuelve una lista de categorias filtradas por el rol.
     *
     * @param $rol
     * @return bool
     */
    function rellenar_categorias($rol) {
        $consult = 'Select DISTINCT categoria.id_categoria, categoria.descripcion from documentacion,categoria where documentacion.id_rol=' . $rol . ' and documentacion.id_categoria=categoria.id_categoria';

        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }


    /**
     * Funcion que devuelve todas las categorias.
     *
     * @return bool
     */
    function rellenar_todas_categorias() {
        $consult = 'Select * from categoria';

        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }


    /**
     * Funcion que devuelve las tareas filtrando por el usuario, la categoria y el rol.
     *
     * @param $id_cat
     * @param $id_rol
     * @param $id_user
     * @return bool
     */
    function rellenar_tareas($id_cat, $id_rol, $id_user) {
        $consult = 'Select tarea.id_tarea, tarea.descripcion, tarea.id_estado, documentacion.modelo, documentacion.link from documentacion, tarea where documentacion.id_categoria=' . $id_cat . ' and documentacion.id_rol=' . $id_rol . ' and documentacion.id_documentacion=tarea.id_documentacion and tarea.id_usuario=' . $id_user;

        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    /**
     * Funcion que obtiene todos los datos de un rol.
     *
     * @param $id_rol
     * @return bool
     */

    function rellenar_gestionrol($id_rol) {
        $consult = 'select * from rol where id_rol=' . $id_rol;

        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    /**
     * Funcion que devuelve los cargos filtrando por rol.
     *
     * @param $id_rol
     * @return bool
     */

    function obtenerUsuarioCargo($id_rol) {
        $consult = 'SELECT * FROM cargo WHERE id_rol=' . $id_rol;

        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    /**
     * Funcion que comprueba si la tarea ya estan asignada al usuario.
     *
     * @param $id_usuario
     * @param $descripcion
     * @return bool
     */

    function verificarInsertTareas($id_usuario, $descripcion) {
        $consult = 'SELECT * FROM tarea WHERE id_usuario=' . $id_usuario . ' AND descripcion="' . $descripcion . '"';

        $this->cursor2 = mysqli_query($this->conex, $consult);

        if ($this->cursor2) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    /**
     * Devuelve toda la informacion de una categoria.
     *
     * @param $id_categoria
     * @return bool
     */

    function rellenar_gestioncategorias($id_categoria) {
        $consult = 'select * from categoria where id_categoria=' . $id_categoria;

        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    /**
     * Funcion que devuelve toda la informacion de una entrega.
     *
     * @param $id_entregas
     * @return bool
     */

    function rellenar_gestionentregas($id_entregas) {
        $consult = 'select * from entregar where id_entregar=' . $id_entregas;

        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    /**
     * Devuelve la informacion que se muestra en el popup de editar usuario.
     *
     * @param $id_usuario
     * @return bool
     */

    function editarUsuario($id_usuario) {
        $consult = 'SELECT rol.descripcion, usuario.id_usuario, usuario.nombre, usuario.apellidos, usuario.email FROM usuario, cargo, rol WHERE usuario.id_usuario=' . $id_usuario . ' AND usuario.id_usuario=cargo.id_usuario AND cargo.id_rol=rol.id_rol';

        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    /**
     * Recoge las tareas filtradas por roles para la ventana Asignar Tareas.
     *
     * @param $id_rol
     * @return bool
     */

    function rellenar_tareas_admin($id_rol) {
        $consult = 'Select tarea.descripcion, tarea.id_tarea FROM tarea,documentacion WHERE tarea.id_documentacion=documentacion.id_documentacion AND id_usuario IS NULL and documentacion.id_rol=' . $id_rol;

        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    /**
     * Funcion que devuelve las tareas de un usuario filtradas por el rol.
     *
     * @param $id_rol
     * @param $id_usu
     * @return bool
     */

    function rellenar_tareas_usu($id_rol,$id_usu) {
        $consult = 'Select tarea.descripcion, tarea.id_tarea FROM tarea,documentacion WHERE tarea.id_documentacion=documentacion.id_documentacion AND id_usuario and id_usuario='.$id_usu.' and documentacion.id_rol=' . $id_rol;

        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    /**
     * Funcion que devuelve la documentacion filtrandoi por categorias y rol
     *
     * @param $id_cat
     * @param $id_rol
     * @return bool
     */

    function rellenar_documentacion($id_cat, $id_rol) {
        $consult = 'Select * from documentacion where id_categoria=' . $id_cat . ' and id_rol=' . $id_rol;

        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    /**
     *
     *
     * @param $id_rol
     * @return bool
     */

    function rellenar_usuarios($id_rol) {
        $consult = 'SELECT usuario.nombre, usuario.id_usuario, usuario.apellidos FROM usuario, cargo WHERE usuario.id_usuario=cargo.id_usuario AND cargo.id_rol=' . $id_rol;
        $this->cursor = mysqli_query($this->conex, $consult);


        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function rellenar_usuariosActivo() {
        $consult = 'SELECT * FROM usuario WHERE confirmado<1';
        $this->cursor = mysqli_query($this->conex, $consult);


        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function cargarUsuarios() {
        $consult = 'SELECT * FROM usuario';
        $this->cursor = mysqli_query($this->conex, $consult);


        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function cargarUsuarioPorID($id_usuario) {
        $consult = 'SELECT * FROM usuario WHERE id_usuario=' . $id_usuario;
        $this->cursor = mysqli_query($this->conex, $consult);


        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function rellenar_usuariosAdministrar() {
        $consult = 'SELECT * FROM usuario,cargo,rol WHERE usuario.confirmado>0 and usuario.id ';
        $this->cursor = mysqli_query($this->conex, $consult);


        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function rellenar_comentario($id_tarea) {
        $consult = 'Select mensaje from comentario where id_tarea=' . $id_tarea;

        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function rellenar_documento($id_docu) {
        $consult = 'Select * from documentacion where id_documentacion=' . $id_docu;

        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function rellenar_textotarea($id_tarea) {
        $consult = 'Select descripcion from  tarea where id_tarea=' . $id_tarea;

        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function rellenar_estado($estado) {
        $consult = "select * from estado where descripcion='" . $estado . "'";
        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function rellenar_roles() {

        $consult = 'Select * from rol';
        $this->cursor = mysqli_query($this->conex, $consult);
        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    //Rellena el comentario de los administradores
    function rellenar_comentarioAdmin() {

        $consult = 'SELECT * FROM comentarioadmin';
        $this->cursor = mysqli_query($this->conex, $consult);
        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function rellenar_entregar() {

        $consult = 'Select * from  entregar';
        $this->cursor = mysqli_query($this->conex, $consult);
        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function updateUsuario($nombre, $apellido, $email, $id_usu) {
        $consult = 'UPDATE usuario SET nombre="' . $nombre . '",apellidos="' . $apellido . '",email="' . $email . '" WHERE id_usuario=' . $id_usu;
        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function actualizargestionrol($id, $descripcion) {
        $consult = 'UPDATE rol SET descripcion="' . $descripcion . '" where id_rol=' . $id;
        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function actualizargestioncategorias($id, $descripcion) {
        $consult = 'UPDATE categoria SET descripcion="' . $descripcion . '" where id_categoria=' . $id;
        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function actualizargestionentregar($id, $descripcion) {
        $consult = 'UPDATE entregar SET descripcion="' . $descripcion . '" where id_entregar=' . $id;
        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function rellenar_descrip_tarea($id_doc) {

        $consult = 'Select descripcion from  tarea where id_documentacion=' . $id_doc;
        $this->cursor = mysqli_query($this->conex, $consult);
        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function actualizar_estado($id_estado, $id_tarea) {
        $consult = 'update tarea set id_estado = ' . $id_estado . ' where id_tarea = ' . $id_tarea;
        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function validar_usuario($id_usuario) {
        $consult = 'update usuario set confirmado = 1 where id_usuario = ' . $id_usuario;
        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    //Funcion carga los comentarios entre los administradores, la llama comentarioAdmin.php
    function update_comentarioAdmin($mensaje) {
        $consult = 'UPDATE comentarioAdmin SET mensaje = "' . $mensaje . '" WHERE id_comenAdmin=1';

        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function denegar_usuario($id_usuario) {
        $consult = "DELETE FROM usuario WHERE id_usuario =" . $id_usuario;
        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function borrarrol($idrol) {
        $consult = "DELETE FROM rol WHERE id_rol ='" . $idrol . "'";
        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function borrar_tarea($id) {
        $consult = "DELETE FROM tarea WHERE id_tarea ='" . $id . "'";
        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function borrarcategorias($idcategoria) {
        $consult = "DELETE FROM categoria WHERE id_categoria ='" . $idcategoria . "'";
        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function borrarentregas($identregas) {
        $consult = "DELETE FROM entregar WHERE id_entregar ='" . $identregas . "'";
        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function actualizarCargos($id_usu, $rol) {
        $query = "INSERT INTO cargo (id_usuario, id_rol) VALUES (?,?)";

        $stmt = mysqli_prepare($this->conex, $query);
        mysqli_stmt_bind_param($stmt, "ii", $id_usu, $rol);
        /* Ejecución de la sentencia. */
        mysqli_stmt_execute($stmt);


        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function asignarTareasUsuario($id_docu, $id_usu, $descripcion) {
        $query = "INSERT INTO tarea (id_usuario, descripcion, id_documentacion, id_estado) VALUES (?,?,?,?)";
        $id_estado = 1;
        $stmt = mysqli_prepare($this->conex, $query);
        mysqli_stmt_bind_param($stmt, "isii", $id_usu, $descripcion, $id_docu, $id_estado);
        /* Ejecución de la sentencia. */
        mysqli_stmt_execute($stmt);


        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function borrarCargosUsuario($id_usu) {
        $consult = "DELETE FROM cargo WHERE id_usuario =" . $id_usu;
        $this->cursor = mysqli_query($this->conex, $consult);


        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function ir_Siguiente() {
        return $this->fila = mysqli_fetch_array($this->cursor);
    }

    function ir_Siguiente2() {
        return $this->fila2 = mysqli_fetch_array($this->cursor2);
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

    function cerrar_Conexion3() {
        mysqli_free_result($this->cursor);
        mysqli_free_result($this->cursor2);
        mysqli_close($this->conex);
    }

    function insert_comentario($texto, $id) {
        $consult = 'Select * from comentario where id_tarea=' . $id;

        $this->cursor = mysqli_query($this->conex, $consult);

        if ($this->ir_Siguiente()) { //Si existe ya un comentario se actualiza
            $query = "update comentario set mensaje='" . $texto . "' where id_tarea=" . $id;
            mysqli_query($this->conex, $query);
        } else { //Si no existe, se crea
            $query = "INSERT INTO comentario (id_tarea, mensaje) VALUES (?,?)"; //Estos parametros seran sustituidos mas adelante por valores.
            $stmt = mysqli_prepare($this->conex, $query);

            mysqli_stmt_bind_param($stmt, "is", $id, $texto);


            /* Ejecución de la sentencia. */
            mysqli_stmt_execute($stmt);
        }
    }

    function borrar_documentacion($id) {
        $query = "DELETE FROM documentacion WHERE id_documentacion =" . $id;
        mysqli_query($this->conex, $query);

        $query = "DELETE FROM tareas WHERE id_documentacion =" . $id;
        mysqli_query($this->conex, $query);

    }

    function update_documento($descripcion, $id_categoria, $id_rol, $id_entregar, $modelo, $id_doc, $link) {
        if ($id_entregar == "0") {
            $query = "update documentacion set descripcion='" . $descripcion . "', modelo='" . $modelo . "',id_rol='" . $id_rol . "',id_entregar=NULL,id_categoria='" . $id_categoria . "',link='" . $link . "' where id_documentacion='" . $id_doc . "'";
        } else {
            $query = "update documentacion set descripcion='" . $descripcion . "', modelo='" . $modelo . "',id_rol='" . $id_rol . "',id_entregar=" . $id_entregar . ",id_categoria='" . $id_categoria . "',link='" . $link . "' where id_documentacion='" . $id_doc . "'";
        }
        mysqli_query($this->conex, $query);
    }

    function update_tarea($descripcion, $id_doc) {
        $query = "update tarea set descripcion='" . $descripcion . "' where id_documentacion='" . $id_doc . "'";

        mysqli_query($this->conex, $query);
    }

    function insertar_documento($descripcion, $id_categoria, $id_rol, $id_entregar, $modelo, $link) {
        if ($id_entregar == "0") {
            $query = "INSERT INTO documentacion (descripcion, id_categoria, modelo,id_rol,link) VALUES (?,?,?,?,?)";
            $stmt = mysqli_prepare($this->conex, $query);

            mysqli_stmt_bind_param($stmt, "sisis", $descripcion, $id_categoria, $modelo, $id_rol, $link);
        } else {
            $query = "INSERT INTO documentacion (descripcion, id_categoria, modelo,id_rol,id_entregar,link) VALUES (?,?,?,?,?,?)";
            $stmt = mysqli_prepare($this->conex, $query);

            mysqli_stmt_bind_param($stmt, "sisiis", $descripcion, $id_categoria, $modelo, $id_rol, $id_entregar, $link);
        }
        /* Ejecución de la sentencia. */
        mysqli_stmt_execute($stmt);
    }

    function insertar_tarea($id_doc, $descripcion) {

        $query = "INSERT INTO tarea (descripcion, id_documentacion) VALUES (?,?)";
        $stmt = mysqli_prepare($this->conex, $query);

        mysqli_stmt_bind_param($stmt, "si", $descripcion, $id_doc);

        /* Ejecución de la sentencia. */
        mysqli_stmt_execute($stmt);
    }

    function sacarTarea($id_tarea) {

        $consult = 'SELECT * FROM tarea WHERE id_tarea=' . $id_tarea;
        $this->cursor = mysqli_query($this->conex, $consult);
        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

    function sacar_ultimo_doc() {

        $consult = 'SELECT id_documentacion FROM documentacion order by id_documentacion desc LIMIT 1';
        $this->cursor = mysqli_query($this->conex, $consult);
        if ($this->cursor) {
            $devolver = true;
        } else {
            $devolver = false;
        }
        return $devolver;
    }

}
