@extends('../maestra')

@section('titulo')
Administracion
@endsection
@section('js')
<script>

    var id_rol;

    $(function () {
        //Codigo Nazario
        $("#carg").on("change", function () {


            $("#contenedortareas").html('');
            $("#contenedordocumentos").html('');

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
                        $("#contenedordocumentos").html('');
                        for (var i = 0; i < documentacion.length; i++) {
                            $("#contenedordocumentos").append('<div value="' + documentacion[i]['id'] + '"  id="tareas" class="panel panel-primary  col-md-4 tarea" ><p class="textotarea">' + documentacion[i]['descripcion'] + '</p><p class="textotarea"><a href="">' + documentacion[i]['modelo'] + '</a></p>\n\
                        <div style="height: 25px; width: 32px; float: right; margin: 0px; padding: 0px; position: relative;">\n\
                        <button class="" onclick="popup(this)" value="' + documentacion[i]['id'] + '" id="comentario" style="width:100%; height:100%; background: transparent; border: 0px; margin:0px;">\n\
                        <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/></button>\n\
                        </div></div>');

                            //style="padding: 0px; margin: auto; text-align: center;"
                        }
                        $("#contenedordocumentos").append(' <div class="col-md-4" style="padding: 0px; margin: auto; text-align: center;"> <div id="tareas" class="panel panel-primary tarea" style="height: 100px;"> </p> <div style="height: 70px; width: 70px; margin: auto; padding: 0px;"> <button class="" onclick="" value="" id="comentario" style="background: transparent; border: 0px; margin:0px;"> <img alt="Añadir documento" title="Añadir documento" src="Imagenes/Administrador/+.png" style="width: 100%; height: 100%; display: block;" class=""/> </button> </div> </div> </div>');

                    }).fail(function (jqXHR) {
                alert("Error de tipo " + jqXHR.status);
            });
        });

        $(function () {

            var valor, contador, parrafo;
            contador = 200;
            valor2 = $('#textocomentario').val().length;

            // Mostramos un mensaje inicial y lo añadimos al div de id contador.
            $('<p class="indicador">Tienes ' + (contador - valor2) + ' caracteres restantes</p>').appendTo('#contador');

            // Definimos el evento para que detecte cada vez que se presione una tecla.
            $('#textocomentario').keydown(function () {

                // Redefinimos el valor de contador al máximo permitido (150).
                contador = 200;

                /* Quitamos el párrafo con clase advertencia o indicador, en caso de que ya se
                 haya mostrado un mensaje */
                $('.advertencia').remove();
                $('.indicador').remove();

                // Tomamos el valor actual del contenido del área de texto
                valor = $('#textocomentario').val().length;

                // Descontamos ese valor al máximo.
                contador = contador - valor;

                /* Dependiendo de cuantos caracteres quedan, mostraremos el mensaje de una
                 u otra forma (lo definiremos a continuación mediante CSS */
                if (contador < 0) {
                    parrafo = '<p class="advertencia">';
                } else {
                    parrafo = '<p class="indicador">';
                }

                // Mostramos el mensaje con el número de caracteres restantes.
                $('#contador').append(parrafo + 'Tienes ' + contador + ' caracteres restantes</p>');

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
        <div class="col-md-9">
            <div class="item" style="min-height: 400px;">
                <b>Documentacion</b>

                <div class="row" id="contenedordocumentos">

                    <div class="col-md-4" style="padding: 0px;">
                        <div id="documentacion" class="panel panel-primary tarea" style="height: 100px;">
                            <p class="textotarea">  </p>
                            <p class="textotarea">
                                <a href="">asljdh akjsdhaks dhkashdkjashdka shdkjahsdkjah dkjahsdkjashd</a>
                            </p>
                            <div style="height: 25px; width: 32px; float: right; margin: 0px; padding: 0px; position: relative;">
                                <button class="" onclick="popup(this)" value="' + tarea[i]['id'] + '" id="comentario" style="width:100%; height:100%; background: transparent; border: 0px; margin:0px;">
                                    <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- BOTON + DOCUMENTO -->
                    <div class="col-md-4" style="padding: 0px; margin: auto; text-align: center;">
                        <div id="tareas" class="panel panel-primary tarea" style="height: 100px;">
                            </p>
                            <div style="height: 90px; width: 90px; margin: auto; padding: 0px;">
                                <button class="" onclick="" data-toggle="modal" data-target="#modalCrearDocumentacion" value="crearDocumentacion" id="crearDocumentacion" style="background: transparent; border: 0px; margin:0px;">
                                    <img alt="Añadir documento" title="Añadir documento" src="Imagenes/Administrador/+.png" style="width: 100%; height: 100%; display: block;" class=""/>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-md-3" >
                <div class="item" style="overflow-y: hidden;">
                    <b>Acción</b>
                    <div class="row" id="contenedordocumentos">


                        <!-- BOTON ELIMINAR -->
                        <div class="col-md-12" style="padding: 0px; margin: auto; text-align: center;">
                            <div id="tareas" class="panel panel-primary tarea" style="height: 100px; ">
                                <div style="height: 90px; width: 90px; margin: auto; padding: 0px;">
                                    <img alt="Añadir documento" title="Añadir documento" src="Imagenes/Administrador/eliminar.png" style="width: 100%; height: 100%; display: block;" class=""/>
                                </div>
                            </div>
                        </div>

                        <!-- BOTON + -->
                        <div class="col-md-12" style="padding: 0px; margin: auto; text-align: center;">
                            <div id="tareas" class="panel panel-primary tarea" style="height: 100px; ">
                                <div style="height: 90px; width: 90px; margin: auto; padding: 0px;">
                                    <img alt="Añadir documento" title="Añadir documento" src="Imagenes/Administrador/+.png" style="width: 100%; height: 100%; display: block;" class=""/>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!--INICIO MODAL DE AÑADIR DOCUMENTACION-->
            <div id="modalCrearDocumentacion" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Crear Documentación</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row" >
                                <div class="col-md-4" style="margin-bottom: 10px;">
                                    <select id="" class='form-control'>
                                        <option value="">Categoria</option>
                                        <option value="">asda</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <select id="" class='form-control'>
                                        <option value="">Rol</option>
                                        <option value="">asda</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <select id="" class='form-control'>
                                        <option value="">Destino</option>
                                        <option value="">asda</option>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <h3>Nombre de la documentación</h3>
                                    <textarea id="textocomentario" name="mensaje" class="form-control" maxlength="200" rows="5" type="text" style="width: 100%; height: 60%;; margin-bottom:10px; resize: none;">200 COMO MAXIMO</textarea>
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


        </div>
    </div>
</div><!-- FIN ROW -->
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
