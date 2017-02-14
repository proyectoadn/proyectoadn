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
            stop: function (event, ui) {


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
                                                    </div>\n\
                                                </div>');                            

                        }

                    }).fail(function (jqXHR) {
                alert("Error de tipo " + jqXHR.status);
            });
        });
    });


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

                <div class="row conectardivisores" id="item1" style="width: 100%;height: 50px;min-height: 400px;max-height: 400px;">
                </div>
            </div>
        </div>



        <div class="col-md-3 ">
            <div class="divborrar">
                <b>Borrar</b>


                <div id="item2" class="conectardivisores divborrar">                    
                </div>
            </div>
        </div>
    </div>


</div>



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
