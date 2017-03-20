@extends('../maestra')

@section('titulo')
Administracion
@endsection

@section('js')



<script>


    function validarPopUp() {
        var nombreDoc = document.getElementById('nombreDoc').value;
        var nombreModelo = document.getElementById('nombreModelo').value;
        var linkModelo = document.getElementById('linkModelo').value;
        var editTarea = document.getElementById('editTarea').value;
        var devolver = true;

        if (nombreDoc == '') {
            //Pongo el input en rojo
            document.getElementById("nombreDoc").style.backgroundColor = "#F18585";
            alert("La descripción de la documentación no puede estar vacía");
            devolver = false;
        } else {
            document.getElementById("nombreDoc").style.backgroundColor = "white";
        }

        if (nombreModelo == '') {
            //Pongo el input en rojo
            document.getElementById("nombreModelo").style.backgroundColor = "#F18585";
            $('#editDoc').attr("disabled", true);
            alert("El nombre del modelo no puede estar vacío");
            devolver = false;
        } else {
            document.getElementById("nombreModelo").style.backgroundColor = "white";
        }

        if (linkModelo == '') {
            //Pongo el input en rojo
            document.getElementById("linkModelo").style.backgroundColor = "#F18585";
            alert("El link del modelo no puede estar vacío");
            devolver = false;
        } else {
            document.getElementById("linkModelo").style.backgroundColor = "white";
        }

        if (editTarea == '') {
            //Pongo el input en rojo
            document.getElementById("editTarea").style.backgroundColor = "#F18585";
            alert("El nombre de la tarea no puede estar vacía");
            devolver = false;
        } else {
            document.getElementById("editTarea").style.backgroundColor = "white";
        }

        if (nombreDoc == '' || nombreModelo == '' || linkModelo == '' || editTarea == '') {
            $('#editDoc').attr("disabled", true);
        } else {
            $('#editDoc').attr("disabled", false);
        }

        return devolver;
    }//Fin validarPopUp
    
    function validarPopUpAnadir() {
        var nombreDoc = document.getElementById('anadirDoc').value;
        var nombreModelo = document.getElementById('anadirModelo').value;
        var linkModelo = document.getElementById('anadirLink').value;
        var editTarea = document.getElementById('addTarea').value;
        var devolver = true;

        if (nombreDoc == '') {
            //Pongo el input en rojo
            document.getElementById("anadirDoc").style.backgroundColor = "#F18585";
            alert("La descripción de la documentación no puede estar vacía");
            devolver = false;
        } else {
            document.getElementById("anadirDoc").style.backgroundColor = "white";
        }

        if (nombreModelo == '') {
            //Pongo el input en rojo
            document.getElementById("anadirModelo").style.backgroundColor = "#F18585";
            alert("El nombre del modelo no puede estar vacío");
            devolver = false;
        } else {
            document.getElementById("anadirModelo").style.backgroundColor = "white";
        }

        if (linkModelo == '') {
            //Pongo el input en rojo
            document.getElementById("anadirLink").style.backgroundColor = "#F18585";
            alert("El link del modelo no puede estar vacío");
            devolver = false;
        } else {
            document.getElementById("anadirLink").style.backgroundColor = "white";
        }

        if (editTarea == '') {
            //Pongo el input en rojo
            document.getElementById("addTarea").style.backgroundColor = "#F18585";
            alert("El nombre de la tarea no puede estar vacía");
            devolver = false;
        } else {
            document.getElementById("addTarea").style.backgroundColor = "white";
        }
        
        
//        var sino;
//            for (var i = 0; i < countCat; i++) {
//                if ($("#anadirCat" + i).prop('checked')) {
//                   sino = true;
//                }else{
//                   sino = false;
//                } 
//            }
//            if(sino == false){
//                alert("Seleccione una categoria")
//            }
        

        if (nombreDoc == '' || nombreModelo == '' || linkModelo == '' || editTarea == '') {
            $('#addDoc').attr("disabled", true);
        } else {
            $('#addDoc').attr("disabled", false);
        }

        return devolver;
    }//Fin validarPopUp



    var id_rol;
    var id_doc;
    var id_cat;
    var countCat = 0;

    $(function () {
        //Funcion que actualiza el textarea de los comentarios de los administradores cada 15segundos
        //Lo carga desde la tabla comentarioadmin,
        function actualizarComentario() {
            $.post("../resources/views/PhpAuxiliares/actualizarComentarioAdmin.php", {},
                    function (response) {

                        //Saca el comentario 
                        var mensaje = JSON.parse(response);

                        //seleccionamos el textarea con javaScript
                        var textarea = document.getElementById("textoComenAdmin");

                        //Si tiene focus el textarea no hace nada
                        //Si no lo tiene actualiza el mensaje (por si lo ha cambiado otro admin)
                        if (document.activeElement === textarea) {
                            //No hace nada
                        } else {
                            $("#textoComenAdmin").val(mensaje);
                        }
                        //Lo actualiza cada 15 segundos
                        setTimeout(actualizarComentario, 15000);
                    }).fail(function (jqXHR) {
                alert("Error de tipo " + jqXHR.status);
            });
        }
        //Llama a los 15 segundos de iniciar la página de administrar
        //Y entra en bucle cada 15 seg actualiza si no tiene el focus
        setTimeout(actualizarComentario, 15000);

        $("#item1,#item2").sortable({
            connectWith: ".conectardivisores",
            cursor: "move",
            receive: function (event, ui) {
                $("#item2").html('');

                $(".borrardocumentacion").html('Documentacion borrada correctamente');
                $(".borrardocumentacion").slideToggle("slow", function () {

                    setTimeout(function () {
                        $(".borrardocumentacion").remove();
                    }, 3000);
                });

                var borrar = $(this).attr('value');
                if (borrar == 'Borrar') {
                    var id_doc = $(ui.item).attr('value');
                    var iddoc = JSON.stringify(id_doc);

                    $.post("../resources/views/PhpAuxiliares/borrardocumentacion.php", {id: iddoc},
                            function (respuesta) {

                            }).fail(function (jqXHR) {
                        alert("Error de tipo " + jqXHR.status);
                    });

                }
            },
            start: function (event, ui) {

                $(".contenidoborrar").css("border-radius", "0px");
                $(".contenidoborrar").css("background-color", "red");
                $(".contenidoborrar").css("opacity", "0.8");
                $(".contenidoborrar").css("background-image", "url('Imagenes/papelera.png')");
                $(".contenidoborrar").css("background-repeat", "no-repeat");

            },
            stop: function (event, ui) {

                $("#borrar").css("border", "none");
                $(".contenidoborrar").css("background-color", "none");
                $(".contenidoborrar").css("opacity", "0.0");
                $(".contenidoborrar").html('');

            }
        });



        //Funcion que se lanza cuando se cambia un valor en el desplegable de cargos
        $("#carg").on("change", function () {


            $("#contenedortareas").html('');
            $("#item1").html('');

            var id = $(this).val();
            id_rol = id;
            var idjson = JSON.stringify(id);

            $.post("../resources/views/PhpAuxiliares/categorias.php", {rol: idjson},
                    function (respuesta) {
                        var categorias = JSON.parse(respuesta);
                        //Con los datos recogidos de la BBDD se rellena el desplegable de categorias.
                        $("#cat").html('<option id="categorias" value="-1">-Elige categoria-</option>');
                        for (var i = 0; i < categorias.length; i++) {
                            $("#cat").append('<option value=' + categorias[i]['id'] + '>' + categorias[i]['descripcion'] + '</option>');
                        }

                    }).fail(function (jqXHR) {
                alert("Error de tipo " + jqXHR.status);
            });

            //AÑADE EL BOTON DE AÑADIR DOCUMENTACIÓN SIEMPRE AL FINALDE TODA LA DOCUMENTACIÓN CARGADA DINAMICAMENTE
            $("#item1").append('<div class="col-lg-3 col-md-6 divdocumentacion">\n\
                                                <div class="documentacion divAniadirDoc">\n\
                                                    <button onclick="popupAdd(this)" class="botonAniadirDoc" id="comentario" data-toggle="modal" data-target="#modalAddDoc">\n\
                                                        <img class="imagenAniadiDoc" alt="Editar documentacion" title="Editar documentacion" src="Imagenes/Administrador/+.png"/>\n\
                                                    </button>\n\
                                                    </div>\n\
                                            </div>');
        });


        $("#cat").on("change", function () {
            id_cat = $(this).val();
            llenar_documentos();

        });




        $('#editDoc').on('click', function () {

            if (validarPopUp()) {

                var descripcion = $('#nombreDoc').val();
                var categoria = $('#categ').val();
                var rol = $('#roles').val();
                var entrega = $('#entregar').val();
                var modelo = $('#nombreModelo').val();
                var link = $('#linkModelo').val();
                var tarea = $('#editTarea').val();
                var update = new Array();
                update.push(descripcion);
                update.push(categoria);
                update.push(rol);
                update.push(entrega);
                update.push(modelo);
                update.push(id_doc);
                update.push(link);
                update.push(tarea);
                var vector = JSON.stringify(update);
                $.post("../resources/views/PhpAuxiliares/actualizardocumentos.php", {datos: vector},
                        function (respuesta) {

                            llenar_documentos();

                        }).fail(function (jqXHR) {
                    alert("Error de tipo " + jqXHR.status);
                });

            } else {
                //alert('no hace el insert');
            }
        });


        //Cuando haces click en el botón de guardar de los comentarios
        //de los administradores
        $('#comenAdmin').on('click', function () {

            //Cojo el texto que tiene el textarea de los comentarios de los administradores
            var descripcion = $('#textoComenAdmin').val();
            //Traduzco a json
            var datos = JSON.stringify(descripcion);

            //Select con php auxiliar del comentario
            $.post("../resources/views/PhpAuxiliares/comentarioAdmin.php", {datos: datos},
                    function (respuesta) {
                        //Pinto el comentario (siempre va a haber solo 1)
                        //En el campo de mensaje de la tabla comentarioadmin
                        $('#textoComenAdmin').html = ("datos[0]['comentario']");

                        //Muestro el divisor de guardado
                        document.getElementById("guardado").style.display = "inline";
                        //Pongo los bordes de arriba y abajo verdes
                        document.getElementById("textoComenAdmin").style.borderTop = "solid 1px green";
                        document.getElementById("textoComenAdmin").style.borderBottom = "solid 1px green";
                        //Pongo el fondo con un verde claro
                        document.getElementById("textoComenAdmin").style.backgroundColor = "#ACFF9F";

                        //A los 2.5 segundos se ejecutan estos comandos
                        setTimeout(function () {
                            //Pongo los bordes como estaban, negros arriba y abajo
                            document.getElementById("textoComenAdmin").style.borderTop = "solid 1px";
                            document.getElementById("textoComenAdmin").style.borderBottom = "solid 1px";
                            //Oculto el divisor de guardado
                            document.getElementById("guardado").style.display = "none";
                            //vuelvo a poner el textarea con fondo blanco
                            document.getElementById("textoComenAdmin").style.backgroundColor = "white";
                        }, 2500);



                    }).fail(function (jqXHR) {
                alert("Error de tipo " + jqXHR.status);
            });

        });


        //Valida los inputs del popUp 
        $(".comprobarAdd").on("change", function () {
            validarPopUpAnadir();
        });

        //Funcion que se inicia cuando se pulsa el boton de aceptar en el popup de añadir.
        $('#addDoc').on('click', function () {

            var descripcion = $('#anadirDoc').val();
            var categoria = new Array();
            for (var i = 0; i < countCat; i++) {
                if ($("#cat" + i).prop('checked')) {
                    categoria.push($("#cat" + i).val());
                }
            }
            var rol = $('#anadirRoles').val();
            var entrega = $('#anadirEntregar').val();
            var modelo = $('#anadirModelo').val();
            var link = $('#anadirLink').val();
            var tarea = $('#addTarea').val();
            var insert = new Array();
            insert.push(descripcion);
            insert.push(categoria);
            insert.push(rol);
            insert.push(entrega);
            insert.push(modelo);
            insert.push(link);
            insert.push(tarea);
            var vector = JSON.stringify(insert);
            console.log(vector);

            $.post("../resources/views/PhpAuxiliares/anadirdocumento.php", {datos: vector},
                    function (respuesta) {
                        console.log(respuesta);
                        llenar_documentos();
                    }).fail(function (jqXHR) {
                alert("Error de tipo " + jqXHR.status);
            });


        });


        //Filtro que se hace cada vez que pulsas una tecla en el filtro buscar
        //oculta la documentacion que no corresponde con lo que se escribe en el filtro 
        $('#filter').keyup(function () {
            var rex = new RegExp($(this).val(), 'i');
            $('.documentacion').hide();
            $('.documentacion').filter(function () {
                return rex.test($(this).text());
            }).show();
        });

    });

    //Funcion que se inicia cuando se pulsa el boton de añadir documentos.
    function popupAdd(boton) {

        var mens = new Array();
        countCat = 0;
        $.post("../resources/views/PhpAuxiliares/rellenaranadir.php", {},
                function (respuesta) {

                    var datos = JSON.parse(respuesta);

                    var categorias = datos[0]['categorias'];
                    var entregar = datos[0]['entregar'];
                    var rol = datos[0]['rol'];
                    $('#anadirDoc').val('');
                    $('#anadirModelo').val('');
                    $('#anadirRoles').html('');
                    $('#addTarea').val('');
                    $('#anadirLink').val('');
                    for (var i = 0; i < rol.length; i++) {
                        if (rol[i]['descripcion'] != 'Profesor') {
                            if (rol[i]['id_rol'] == $("#carg").val()) { //Comprueba los cargos con el seleccionado, para empezar con el checkeado.
                                $('#anadirRoles').append('<option selected value="' + rol[i]['id_rol'] + '">' + rol[i]['descripcion'] + '</option>');
                            } else {
                                $('#anadirRoles').append('<option value="' + rol[i]['id_rol'] + '">' + rol[i]['descripcion'] + '</option>');
                            }
                        }
                    }

                    $('#anadirEntregar').html('');
                    $('#anadirEntregar').append('<option value="0">A nadie</option>');

                    for (var i = 0; i < entregar.length; i++) {

                        $('#anadirEntregar').append('<option value="' + entregar[i]['id_entregar'] + '">' + entregar[i]['descripcion'] + '</option>');

                    }

                    $('#anadirCat').html('');
                    for (var i = 0; i < categorias.length; i++) {
                        countCat++;
                        if (categorias[i]['id_categoria'] == $("#cat").val()) {
                            $('#anadirCat').append(' <label class="displayBock"> <input  id="cat' + i + '" checked type="checkbox" value="' + categorias[i]['id_categoria'] + '">' + categorias[i]['descripcion'] + '</label>');
                        } else {
                            $('#anadirCat').append(' <label class="displayBock"> <input id="cat' + i + '" type="checkbox" value="' + categorias[i]['id_categoria'] + '">' + categorias[i]['descripcion'] + '</label>');
                        }
                    }


                }
        ).fail(function (jqXHR) {
            alert("Error de tipo " + jqXHR.status);
        });
    }

    //Funcion que se lanza cuando se pulsa el boton de editar documentacion.
    function popup(boton) {

        var mens = new Array();
        id_docu = boton.value;
        id_doc = id_docu;
        var idjson = JSON.stringify(id_docu);

        $.post("../resources/views/PhpAuxiliares/rellenardocumentacion.php", {id: idjson},
                function (respuesta) {

                    var datos = JSON.parse(respuesta);


                    var categorias = datos[0]['categorias'];
                    var entregar = datos[0]['entregar'];
                    var rol = datos[0]['rol'];
                    var nombre = datos[0]['nombre'];
                    var link = datos[0]['link'];
                    var id_rol = datos[0]['id_rol'];
                    var id_entrega = datos[0]['id_entrega'];
                    var id_categoria = datos[0]['id_categoria'];
                    var modelo = datos[0]['modelo'];
                    var descrip_tarea = datos[0]['descrip_tarea'];

                    //Se rellenan los campos del popup con los datos de la BBDD
                    $('#nombreDoc').val(nombre);
                    $('#nombreModelo').val(modelo);
                    $('#editTarea').val(descrip_tarea);
                    $('#linkModelo').val(link);
                    $('#roles').html('');
                    for (var i = 0; i < rol.length; i++) {
                        if (rol[i]['descripcion'] != 'Profesor') {

                            if (rol[i]['id_rol'] == id_rol) {
                                $('#roles').append('<option selected value="' + rol[i]['id_rol'] + '">' + rol[i]['descripcion'] + '</option>');

                            } else {
                                $('#roles').append('<option value="' + rol[i]['id_rol'] + '">' + rol[i]['descripcion'] + '</option>');
                            }
                        }
                    }

                    $('#entregar').html('');
                    $('#entregar').append('<option value="0">A nadie</option>');

                    for (var i = 0; i < entregar.length; i++) {

                        if (entregar[i]['id_entregar'] == id_entrega) {
                            $('#entregar').append('<option selected value="' + entregar[i]['id_entregar'] + '">' + entregar[i]['descripcion'] + '</option>');
                        } else {

                            $('#entregar').append('<option value="' + entregar[i]['id_entregar'] + '">' + entregar[i]['descripcion'] + '</option>');
                        }
                    }

                    $('#categ').html('');
                    for (var i = 0; i < categorias.length; i++) {
                        if (categorias[i]['id_categoria'] == id_categoria) {
                            $('#categ').append('<option selected value="' + categorias[i]['id_categoria'] + '">' + categorias[i]['descripcion'] + '</option>');
                        } else {
                            $('#categ').append('<option value="' + categorias[i]['id_categoria'] + '">' + categorias[i]['descripcion'] + '</option>');
                        }
                    }


                }
        ).fail(function (jqXHR) {
            alert("Error de tipo " + jqXHR.status);
        });
    }

    //Funcion que rellena los documentos filtrados.
    function llenar_documentos() {
        var vector = new Array();
        vector.push(id_cat);
        vector.push(id_rol);
        var idjson = JSON.stringify(vector);
        $("#item1").html('');
        $.post("../resources/views/PhpAuxiliares/documentacion.php", {id: idjson},
                function (respuesta) {

                    var documentacion = JSON.parse(respuesta);
                    //Construye las etiquetas con la documentacion.
                    for (var i = 0; i < documentacion.length; i++) {
                        $("#item1").append('<div class="col-lg-3 col-md-6 divdocumentacion" value=' + documentacion[i]['id'] + '>\n\
                                            <div class="documentacion">\n\
                                                <p>' + documentacion[i]['descripcion'] + '</p>\n\
                                                <p class="textotarea"><a href="' + documentacion[i]['link'] + '">' + documentacion[i]['modelo'] + '</a>\n\</p>\n\
                                                <div class="divisorBotonTarea">\n\
                                                    <button onclick="popup(this)" class="botonTarea" value="' + documentacion[i]['id'] + '" id="comentario" data-toggle="modal" data-target="#modalModificarTarea">\n\
                                                        <img alt="Editar documentacion" title="Editar documentacion" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/>\n\
                                                    </button>\n\
                                                </div>\n\
                                            </div>\n\
                                        </div>');
                    }

                    //AÑADE EL BOTON DE AÑADIR DOCUMENTACIÓN SIEMPRE AL FINALDE TODA LA DOCUMENTACIÓN CARGADA DINAMICAMENTE
                    $("#item1").append('<div class="col-lg-3 col-md-6 divdocumentacion ">\n\
                                                <div class="documentacion divAniadirDoc">\n\
                                                    <button onclick="popupAdd(this)" class="botonAniadirDoc" id="comentario"data-toggle="modal" data-target="#modalAddDoc">\n\
                                                        <img class="imagenAniadiDoc" alt="Editar documentacion" title="Editar documentacion" src="Imagenes/Administrador/+.png"/>\n\
                                                    </button>\n\
                                                    </div>\n\
                                            </div>');

                }).fail(function (jqXHR) {
            alert("Error de tipo " + jqXHR.status);
        });
    }
</script>
@endsection


@section('contenido')

@include ('PhpAuxiliares/cabeceraadministrador')

<div class="contenedorPrincipal">
    <!--div que contiene los cargos y las categorias-->
    <div class="cargoCat">
        <div class='divBotonCargoCat'>
            <select title="Desplegable con los cargos" id="carg" class='botonCargoCat form-control'>
                <option value="-1">-Elige cargo-</option>
                <!-- rellena el desplegable de cargos con los datos que le da el controlador -->
                @for($i=0;$i<count($roles);$i++)
                    @if($roles[$i]->descripcion!='Profesor')
                    <option value="{!! $roles[$i]->id_rol !!}">{!! $roles[$i]->descripcion !!}</option>
                    @endif
                    @endfor
            </select>
        </div>
        <div class='divBotonCargoCat'>
            <select title="Desplegable con las categorias" id="cat" name="cat" size="" class='botonCargoCat form-control'>
                <option id="categorias" value="-1">-Elige categoria-</option>

            </select>
        </div>

        <div class='divBotonCargoCat' style="width: 20%;">
            <div class="input-group botonCargoCat">
                <span class="input-group-addon">
                    Buscar
                </span>
                <input title="Filtro para buscar" type="text" class="form-control" id="filter">
            </div>
        </div>

        <div style="width:40%; margin-top: 2px; text-align: center; float: right;">
            <a href="administrar"> <img src="Imagenes/Logos/logoCabeceraAdmin.png" alt="Logo GETY"></a>
        </div>
    </div>

    <div class='limpiar'></div>


    <div class="row">

        <div class="col-md-9" style="margin-bottom: 15px;" >
            <div class="item">
                <b>Documentacion</b>

                <div class="row conectardivisores" value="Documentacion" id="item1"
                     style="width: 100%;height: 50px;min-height: 440px;max-height: 440px;">

                    <div class="col-lg-3 col-md-6 divdocumentacion" value=' + documenta'>

                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-3 ">
            <div class="divborrar" id="borrar">
                <b>Borrar</b>


                <div id="item2" class="conectardivisores divborrar contenidoborrar" value="Borrar">
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="divborrar" style='margin-top: 15px;'>
                <b>Comentarios</b>
                <textarea title="Area de texto para el comentario de los administradores" id="textoComenAdmin"
                          style="padding: 7px; height: 150px; border-left: none; border-top: solid 1px; border-bottom: solid 1px;">{!! $comentarioAdmin !!}</textarea>

                <div id="guardado" style="color: green; padding: 8px; display: none; width: 70%; float: left;">Comentario guardado</div>

                <button id="comenAdmin" class="btn btn-primary" style="margin: 5px; float: right;">Guardar</button>

            </div>
        </div>

    </div>
</div>
</div>

<div class="alert alert-danger borrardocumentacion">

</div>

<!--INICIO MODAL DE MODIFICAR DOCUMENTACION-->
<div id="modalModificarTarea" class="modal fade" role="dialog">
    <div class="modal-dialog anchuraModalCrearDocumentacion">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="row">
                    <div class="col-md-12" style="margin-bottom: 10px;">
                        <label for="nombreDoc">Descripción Documentación</label>
                        <input name="nombreDoc" id="nombreDoc" type="text" class="form-control comprobar" id="nombreTarea"
                               value="">
                    </div>

                    <div class="col-md-4" style="margin-bottom: 10px;">
                        <label for="categ">Categorias</label>
                        <select id="categ" class="form-control">
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="roles">Roles</label>
                        <select id="roles" class="form-control">
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="entregar">Entrega</label>
                        <select id="entregar" class="form-control">
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="nombreModelo">Modelo</label>
                        <input name="nombreModelo" id="nombreModelo" type="text" class="form-control comprobar"
                               id="nombreTarea" value="">
                        <br>

                        <label for="linkModelo">Link del modelo</label>
                        <input name="linkModelo" id="linkModelo" type="text" class="form-control comprobar" id="nombreTarea"
                               value="">
                    </div>
                </div>
            </div>
            <!--parte de la tarea-->
            <br>
            <div class="modal-footer">
                <div class="col-md-12 text-left">
                    <label for="editTarea">Descripción de la tarea asociada al documento</label>
                    <input name="tarea" id="editTarea" type="text" class="form-control comprobar"
                           value="">
                    <br>
                </div>
            </div>
            <div class="modal-footer">
                <button id="editDoc" class="btn btn-primary" id="insertarDocumentacion" disabled data-dismiss="modal">
                    Aceptar
                </button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>
<!--FINAL MODAL DE MODIFICAR DOCUMENTACION-->

<!--INICIO MODAL DE AÑADIR DOCUMENTACION-->
<div id="modalAddDoc" class="modal fade" role="dialog">
    <div class="modal-dialog anchuraModalCrearDocumentacion">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="row">
                    <div class="col-md-12" style="margin-bottom: 10px;">
                        <label for="anadirDoc">Descripción Documentación</label>
                        <input  name="nombreDoc" id="anadirDoc" type="text" class="form-control comprobarAdd" id="nombreTarea"
                                value="">
                    </div>
                    <div class="col-md-4" style="margin-bottom: 10px;">
                        <label>Categorias</label>
                        <div class="checkbox" id="anadirCat">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="anadirRoles">Roles</label>
                        <select id="anadirRoles" class="form-control">
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="anadirEntregar">Entrega</label>
                        <select id="anadirEntregar" class="form-control">
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="anadirModelo">Modelo</label>
                        <input name="nombreModelo" id="anadirModelo" type="text" class="form-control comprobarAdd"
                               id="nombreTarea" value="">
                        <br>

                        <label for="anadirLink">Link del modelo</label>
                        <input name="linkModelo" id="anadirLink" type="text" class="form-control comprobarAdd" id="nombreTarea"
                               value="">
                    </div>
                </div>
            </div>
            <!--parte de la tarea-->
            <br>
            <div class="modal-footer">
                <div class="col-md-12 text-left">
                    <label for="addTarea">Descripción de la tarea asociada al documento</label>
                    <input name="tarea" id="addTarea" type="text" class="form-control comprobarAdd"
                           value="">
                    <br>
                </div>
            </div>
            <div class="modal-footer">
                <button id="addDoc" class="btn btn-primary" id="anadirDocumentacion" data-dismiss="modal" disabled>
                    Aceptar
                </button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>
<!--FINAL MODAL DE AÑADIR DOCUMENTACION-->
@endsection

@section('footer')


@include ('PhpAuxiliares/footer')

@endsection
