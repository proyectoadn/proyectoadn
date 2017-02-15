@extends('../maestra')

@section('titulo')
    Administracion
@endsection


@section('js')

    <script>

        var id_rol;
        var id_doc;

        $(function () {





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


            //Codigo Nazario
            $("#carg").on("change", function () {


                $("#contenedortareas").html('');
                $("#item1").html('');

                var id = $(this).val();
                id_rol = id;
                var idjson = JSON.stringify(id);

                $.post("../resources/views/PhpAuxiliares/categorias.php", {rol: idjson},
                        function (respuesta) {


                            var categorias = JSON.parse(respuesta);

                            $("#cat").html('<option id="categorias" value="-1">-Elige categoria-</option>');
                            for (var i = 0; i < categorias.length; i++) {
                                $("#cat").append('<option value=' + categorias[i]['id'] + '>' + categorias[i]['descripcion'] + '</option>');
                            }

                        }).fail(function (jqXHR) {
                    alert("Error de tipo " + jqXHR.status);
                });
            });


            $("#cat").on("change", function () {

                var id = $(this).val();
                var vector = new Array();
                vector.push(id);
                vector.push(id_rol);
                var idjson = JSON.stringify(vector);

                $.post("../resources/views/PhpAuxiliares/documentacion.php", {id: idjson},
                        function (respuesta) {

                            var documentacion = JSON.parse(respuesta);
                            $("#item1").html('');
                            for (var i = 0; i < documentacion.length; i++) {
//                            $("#item1").append('\<div class="divTareasAdmin">\n\<div value="' + documentacion[i]['id'] + '"  id="tareas" class="panel panel-primary col-lg-3 col-md-6 tarea estiloTareaAdmin" >\n\
//                                                                    <p class="textotarea">' + documentacion[i]['descripcion'] + '</p>\n\
//                                                                    <p class="textotarea">\n\
//                                                                        <a href="">' + documentacion[i]['modelo'] + '</a>\n\
//                                                                    </p>\n\
//                                                                    <div class="divisorBotonTarea">\n\
//                                                                        <button class="botonTarea" value="' + documentacion[i]['id'] + '" id="comentario"data-toggle="modal" data-target="#modalModificarTarea">\n\
//                                                                            <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/>\n\
//                                                                        </button>\n\
//                                                                    </div>\n\
//                                                                </div>');
//
//                            //style="padding: 0px; margin: auto; text-align: center;"
//
//                        }

                                $("#item1").append('<div class="col-lg-3 col-md-6 divdocumentacion" value=' + documentacion[i]['id'] + '>\n\
                                                    <div class="documentacion">\n\
                                                        <p>' + documentacion[i]['descripcion'] + '</p>\n\
                                                        <p class="textotarea"><a href="">' + documentacion[i]['modelo'] + '</a>\n\</p>\n\
                                                        <div class="divisorBotonTarea">\n\
                                                            <button onclick="popup(this)" class="botonTarea" value="' + documentacion[i]['id'] + '" id="comentario"data-toggle="modal" data-target="#modalModificarTarea">\n\
                                                                <img alt="Editar documentacion" title="Editar documentacion" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/>\n\
                                                            </button>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                </div>');

                            }

                        }).fail(function (jqXHR) {
                    alert("Error de tipo " + jqXHR.status);
                });
            });


            $('#editDoc').on('click',function(){

                var descripcion= $('#nombreDoc').val();
                var categoria=$('#categ').val();
                var rol=$('#roles').val();
                var entrega=$('#entregar').val();
                var modelo=$('#nombreModelo').val();
                var update=new Array();
                update.push(descripcion);
                update.push(categoria);
                update.push(rol);
                update.push(entrega);
                update.push(modelo);
                update.push(id_doc);
                var vector = JSON.stringify(update);

                $.post("../resources/views/PhpAuxiliares/actualizardocumentos.php", {datos: vector},
                        function (respuesta) {
                            console.log(respuesta);

                        }).fail(function (jqXHR) {
                    alert("Error de tipo " + jqXHR.status);
                });


            });
        });




        function popup(boton) {

            var mens = new Array();
            id_docu = boton.value;
            id_doc=id_docu;
            var idjson = JSON.stringify(id_docu);

            $.post("../resources/views/PhpAuxiliares/rellenardocumentacion.php", {id: idjson},
                    function (respuesta) {
                        var datos = JSON.parse(respuesta);

                        var documento = datos[0]['documento']
                        var categorias = datos[0]['categorias'];
                        var entregar = datos[0]['entregar'];
                        var rol = datos[0]['rol'];
                        console.log(rol);
                        $('#nombreDoc').val(documento[0]['descripcion']);
                        $('#nombreModelo').val(documento[0]['modelo']);
                        $('#roles').html('');
                        for (var i = 0; i < rol.length; i++) {
                            if (rol[i]['id_rol'] == documento[0]['id_rol']) {
                                $('#roles').append('<option selected value="' + rol[i]['id_rol'] + '">' + rol[i]['descripcion'] + '</option>');

                            }
                            else {
                                $('#roles').append('<option value="' + rol[i]['id_rol'] + '">' + rol[i]['descripcion'] + '</option>');
                            }
                        }

                        $('#entregar').html('');
                        $('#entregar').append('<option value="0">A nadie</option>');

                        for (var i = 0; i < entregar.length; i++) {

                            if (entregar[i]['id_entregar'] == documento[0]['id_entregar']) {
                                $('#entregar').append('<option selected value="' + entregar[i]['id_entregar'] + '">' + entregar[i]['descripcion'] + '</option>');
                            }
                            else {

                                $('#entregar').append('<option value="' + entregar[i]['id_entregar'] + '">' + entregar[i]['descripcion'] + '</option>');
                            }
                        }

                        $('#categ').html('');
                        for (var i = 0; i < categorias.length; i++) {
                            if (categorias[i]['id_categoria'] == documento[0]['id_categoria']) {
                                $('#categ').append('<option selected value="' + categorias[i]['id_categoria'] + '">' + categorias[i]['descripcion'] + '</option>');
                            }
                            else {
                                $('#categ').append('<option value="' + categorias[i]['id_categoria'] + '">' + categorias[i]['descripcion'] + '</option>');
                            }
                        }


                    }
            ).fail(function (jqXHR) {
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
                <select id="carg" class='botonCargoCat form-control'>
                    <option value="-1">-Elige cargo-</option>

                    @for($i=0;$i<count($roles[0]);$i++)
                        <option value="{!! $roles[0][$i]->id_rol !!}">{!! $roles[0][$i]->descripcion !!}</option>
                    @endfor
                </select>
            </div>
            <div class='divBotonCargoCat'>
                <select id="cat" name="cat" size="" class='botonCargoCat form-control'>
                    <option id="categorias" value="-1">-Elige categoria-</option>

                </select>
            </div>
        </div>

        <div class='limpiar'></div>


        <div class="row">

            <div class="col-md-9 ">
                <div class="item">
                    <b>Documentacion</b>

                    <div class="row conectardivisores" value="Documentacion" id="item1"
                         style="width: 100%;height: 50px;min-height: 400px;max-height: 400px;">
                        <div class="col-lg-3 col-md-6 divdocumentacion" value=' + documenta'>
                            <div class="documentacion">
                                <p>' + documentacion[i]['descripcion'] + '</p>\n\
                                <p class="textotarea"><a href="">' + documentacion[i]['modelo'] + '</a></p>

                                <div class="divisorBotonTarea">
                                    <button class="botonTarea" value="' + documentacion[i]['id'] + '" id="comentario"
                                            data-toggle="modal" data-target="#modalModificarTarea">
                                        <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png"
                                             style="width: 100%; height: 100%;" class=""/>
                                    </button>
                                </div>
                            </div>
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
        </div>
    </div>

    <div class="alert alert-danger borrardocumentacion">

    </div>

    <!--INICIO MODAL DE AÑADIR DOCUMENTACION-->
    <div id="modalModificarTarea" class="modal fade" role="dialog">
        <div class="modal-dialog anchuraModalCrearDocumentacion">
            <!-- Modal content-->
            <div class="modal-content">
                <!--<div class="modal-header">
                    <div class="form-group">
                        <label for="nombreDoc">Nombre Documentación</label>
                            <input name="nombreDoc" id="nombreDoc" type="text" class="form-control" id="nombreTarea" value="asdad">
                    </div>
                </div>-->
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom: 10px;">
                            <label for="nombreDoc">Descripción Documentación</label>
                            <input name="nombreDoc" id="nombreDoc" type="text" class="form-control" id="nombreTarea"
                                   value="">
                        </div>
                        <div class="col-md-4" style="margin-bottom: 10px;">
                            <h4>Categorias</h4>


                            <select id="categ" class="form-control">
                                <option>1</option>
                                <option>2</option>
                            </select>


                        </div>

                        <div class="col-md-4">
                            <h4>Roles</h4>

                            <select id="roles" class="form-control">
                                <option>1</option>
                                <option>2</option>
                            </select>


                        </div>

                        <div class="col-md-4">
                            <h4>Entrega</h4>


                            <select id="entregar" class="form-control">
                                <option>1</option>
                            </select>


                        </div>
                        <div class="col-md-12">
                            <label for="nombreModelo">Modelo</label>
                            <input name="nombreModelo" id="nombreModelo" type="text" class="form-control"
                                   id="nombreTarea" value="asdad">
                            <br>

                            <label for="linkModelo">Link del modelo</label>
                            <input name="linkModelo" id="linkModelo" type="text" class="form-control" id="nombreTarea"
                                   value="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="editDoc" class="btn btn-primary" id="insertarDocumentacion" data-dismiss="modal">Aceptar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <!--FINAL MODAL DE AÑADIR DOCUMENTACION-->



@endsection

@section('footer')

    <div class="divfooter">

        Desarrollado por:

        Daniel Ramirez Ros -
        Alberto de la Plaza Ramos -
        Nazario Castillero Redondo<br>

        Copyright 2017 - Proyectoadn

    </div>


@endsection
