@extends('../maestra')

@section('titulo')
Administracion
@endsection


@section('js')

<script>

    var id_rol;

    $(function () {



        $("#item1,#item2").sortable({
            connectWith: ".conectardivisores",
            cursor: "move",
            receive: function (event, ui) {
                $("#item2").html('');

                var borrar = $(this).attr('value');
                if (borrar == 'Borrar') {
                    var id_doc = $(ui.item).attr('value');
                    var iddoc = JSON.stringify(id_doc);
                    console.log(iddoc);
                    $.post("../resources/views/PhpAuxiliares/borrardocumentacion.php", {id: iddoc},
                            function (respuesta) {
                                console.log(respuesta);

                            }).fail(function (jqXHR) {
                        alert("Error de tipo " + jqXHR.status);
                    });

                }
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
    });
    function popup(boton) {

        var mens = new Array();
        id_docu = boton.value;
        var idjson = JSON.stringify(id_docu);

        $.post("../resources/views/PhpAuxiliares/rellenardocumentacion.php", {id: idjson},
                function (respuesta) {
                    var datos = JSON.parse(respuesta);
                    console.log(datos);
                    var documento=datos[0]['documento']
                    var categorias=datos[0]['categorias'];
                    var entregar=datos[0]['entregar'];
                    var rol=datos[0]['rol'];
                    if (comentariotexto.length > 0) {
                        mens.push(comentariotexto[0]['mensaje']);
                        mens.push(comentariotexto[0]['descripcion']);
                    } else {
                        mens.push('');
                        mens.push(comentariotexto[0]['descripcion']);
                    }

                    $("#textocomentario").val(mens[0]);
                    $("#titulocoment").html(mens[1]);


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

                <div class="row conectardivisores" value="Documentacion" id="item1" style="width: 100%;height: 50px;min-height: 400px;max-height: 400px;">
                    <div class="col-lg-3 col-md-6 divdocumentacion" value=' + documenta'>
                         <div class="documentacion">
                            <p>' + documentacion[i]['descripcion'] + '</p>\n\
                            <p class="textotarea"><a href="">' + documentacion[i]['modelo'] + '</a></p>
                            <div class="divisorBotonTarea">
                                <button class="botonTarea" value="' + documentacion[i]['id'] + '" id="comentario"data-toggle="modal" data-target="#modalModificarTarea">
                                    <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-md-3 ">
            <div class="divborrar">
                <b>Borrar</b>


                <div id="item2" class="conectardivisores divborrar" value="Borrar">
                </div>
            </div>
        </div>
    </div>
</div>

<!--INICIO MODAL DE AÑADIR DOCUMENTACION-->
<div id="modalModificarTarea" class="modal fade" role="dialog">
    <div class="modal-dialog anchuraModalCrearDocumentacion">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="form-group">
                    <input type="text" class="form-control" id="nombreTarea" value="asdad">
                </div>
            </div>
            <div class="modal-body">
                <div class="row" >
                    <div class="col-md-4" style="margin-bottom: 10px;">
                        <h4>Categorias</h4>
                        <div id="categorias" class="checkbox">
                            <label>
                                <input type="checkbox" value="">Option 1
                            </label>
                        </div>
                    </div>

                    <div  class="col-md-4">
                        <h4>Roles</h4>
                        <div id="roles" class="checkbox">

                            <label>
                                <input type="checkbox" value="">Option 1
                            </label>
                        </div>
                    </div>

                    <div id="entregar" class="col-md-4">
                        <h4>Entrega</h4>
                        <div id="entregar" class="checkbox">

                            <div class="col-md-6">
                                <label>
                                    <input type="checkbox" value="">Option 1
                                </label>
                                <label>
                                    <input type="checkbox" value="">Option 1
                                </label>
                                <label>
                                    <input type="checkbox" value="">Option 1
                                </label>
                                <label>
                                    <input type="checkbox" value="">Option 1
                                </label>
                                <label>
                                    <input type="checkbox" value="">Option 1
                                </label>
                                <label>
                                    <input type="checkbox" value="">Option 1
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label>
                                    <input type="checkbox" value="">Option 12
                                </label>
                                <label>
                                    <input type="checkbox" value="">Option 12
                                </label>
                                <label>
                                    <input type="checkbox" value="">Option 12
                                </label>
                                <label>
                                    <input type="checkbox" value="">Option 12
                                </label>
                                <label>
                                    <input type="checkbox" value="">Option 12
                                </label>
                                <label>
                                    <input type="checkbox" value="">Option 12
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h3>Nombre de la documentación</h3>
                        <textarea id="textocomentario" name="mensaje" class="form-control" maxlength="200" rows="3" type="text" 
                                  style="width: 100%; height: 60%;; margin-bottom:10px; resize: none;"
                                  value="NUMERO MDF3234"></textarea>
                        <div id="contador" class="text-right text-danger" style="font-size:0.8em;"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="insertarDocumentacion" data-dismiss="modal" >Aceptar</button>
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
