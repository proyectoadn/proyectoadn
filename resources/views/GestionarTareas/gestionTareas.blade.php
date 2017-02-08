@extends('../maestra')

@section('titulo')
Gestión de tareas
@endsection

@section('js')

<script src="jquery-2.1.4.js"></script>
<script src="jquery-ui.min.js"></script>



<script>

    var id_rol;

    $(function () {


        //Codigo Dani
        $("#item1,#item2,#item3").sortable({
            connectWith: ".conectardivisores",
            cursor: "move",
            start: function (event, ui) {


                $(ui.item).css("-webkit-transform", "rotate(7deg)");
            },
            stop: function (event, ui) {


                $(ui.item).css("-webkit-transform", "rotate(0deg)");
            },
            receive: function (event, ui) {

                var id_tarea = $(ui.item).attr('value');
                var idtarea = JSON.stringify(id_tarea);


                var descripcionestado = $(this).attr('value');
                var estado = JSON.stringify(descripcionestado);


                $.post("../resources/views/PhpAuxiliares/actualizarestado.php", {id: idtarea, estadoactual: estado},
                        function (respuesta) {


                            if (respuesta) {

                                //alert("actualziado con exito");
                            } else {

                                // alert("no actualizado con exito");
                            }

                        }).fail(function (jqXHR) {
                    alert("Error de tipo " + jqXHR.status);
                });
            }
        });


        //Codigo Nazario
        $("#carg").on("change", function () {


            $("#item1").html('');
            $("#item2").html('');
            $("#item3").html('');

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
            vector.push("<?php echo $id_user ?>");
            vector.push(id_rol);
            var idjson = JSON.stringify(vector);

            $.post("../resources/views/PhpAuxiliares/tareas.php", {id: idjson},
                    function (respuesta) {
                        var tarea = JSON.parse(respuesta);
                        $("#item1").html('');
                        $("#item2").html('');
                        $("#item3").html('');

                        for (var i = 0; i < tarea.length; i++) {
                            if (tarea[i]['estado'] == 1) {
                                $("#item1").append('<div value="' + tarea[i]['id'] + '" id="tareas" class="panel panel-primary tarea"><p class="textotarea">' + tarea[i]['descripcion'] + '</p><p class="textotarea"><a href="">' + tarea[i]['modelo'] + '</a></p>\n\
                            <div style="height: 25px; width: 32px; float: right; margin: 0px; padding: 0px; position: relative;">\n\
                            <button class="" onclick="popup(this)" value="' + tarea[i]['id'] + '" id="comentario" style="width:100%; height:100%; background: transparent; border: 0px; margin:0px;">\n\
                            <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/></button>\n\
                            </div></div>');
                            } else if (tarea[i]['estado'] == 2) {
                                $("#item2").append('<div value="' + tarea[i]['id'] + '" id="tareas" class="panel panel-primary tarea"><p class="textotarea">' + tarea[i]['descripcion'] + '</p><p class="textotarea"><a href="">' + tarea[i]['modelo'] + '</a></p>\n\
                            <div style="height: 25px; width: 32px; float: right; margin: 0px; padding: 0px; position: relative;">\n\
                            <button class="" onclick="popup(this)" value="' + tarea[i]['id'] + '" id="comentario" style="width:100%; height:100%; background: transparent; border: 0px; margin:0px;">\n\
                            <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/></button>\n\
                            </div></div>');
                            } else if (tarea[i]['estado'] == 3) {
                                $("#item3").append('<div value="' + tarea[i]['id'] + '" id="tareas" class="panel panel-primary tarea"><p class="textotarea">' + tarea[i]['descripcion'] + '</p><p class="textotarea"><a href="">' + tarea[i]['modelo'] + '</a></p>\n\
                            <div style="height: 25px; width: 32px; float: right; margin: 0px; padding: 0px; position: relative;">\n\
                            <button class="" onclick="popup(this)" value="' + tarea[i]['id'] + '" id="comentario" style="width:100%; height:100%; background: transparent; border: 0px; margin:0px;">\n\
                            <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/></button>\n\
                            </div></div>');
                            }
                        }

                    }).fail(function (jqXHR) {
                alert("Error de tipo " + jqXHR.status);
            });
        });
    });

    function popup(boton) {

        var mens = new Array();
        var id_tarea = boton.value;
        var idjson = JSON.stringify(id_tarea);

        $.post("../resources/views/PhpAuxiliares/rellenarcomentario.php", {id: idjson},
                function (respuesta) {
                    var comentariotexto = JSON.parse(respuesta);
                    if (comentariotexto.length > 0) {
                        mens.push(comentariotexto[0]['mensaje']);
                        mens.push(comentariotexto[0]['descripcion']);
                    } else {
                        mens.push('');
                        mens.push(comentariotexto[0]['descripcion']);
                    }
                    w2popup.open({
                        width: 600, // Anchura en px
                        height: 450, // Altura en px
                        title: 'Insertar comentario',
                        body: '<div class="w2ui-centered">\n\
                                <div class="form-group" style="width: 90%; margin: auto;">  \n\
                                    <h4 class="modal-title text-left" >' + mens[1] + '</h4>\n\
                                    <label for="comentario"></label>\n\
                                    <div id="correcto" class="text-right comentarioGuardado"><img src="Imagenes/registro/v.png" alt="Comentario actualizado" style="width: 16px; height: 16px; margin-right: 3px;" />Comentario guardado correctamente</div>\n\
                                    <textarea id="textocomentario" name="mensaje" class="form-control" maxlength="250" rows="10" type="text" style="width: 100%; height: 60%;; margin-bottom:10px; resize: none;">' + mens[0] + '</textarea>\n\
                                <div id="contador" class="text-right text-danger" style="font-size:0.8em;">\n\
                               </div>',
                        buttons: '<button class="w2ui-btn" id="insertarComentario2" name="insertarComentario2" onclick="w2popup.close();">Aceptar</button> '+
                                '<button class="w2ui-btn" onclick="w2popup.close();">Cancelar</button> '+
                                '<button class="w2ui-btn" disabled name="insertarComentario" id="insertarComentario">Aplicar cambios</button>',
                        showMax: true, //Muestra el botón de maximizar
                        showClose: true, //Muestra el botón de cerrar el PoPUp
                        keyboard: true, // Se cierra dándole al ESC
                        speed: 0.6, // popup speed (in seconds)
                        opacity: 0.4,
                        color: 'black' //Cambia el color de fondo 
                        

                    });
            
                    //Insert en BBDD del comentario
                    $("#insertarComentario,#insertarComentario2").on('click', function () {
                        var texto = $("#textocomentario").val();

                        var vector = new Array();
                        vector.push(texto);
                        vector.push(id_tarea);
                        var comentario = JSON.stringify(vector);

                        $.post("../resources/views/PhpAuxiliares/comentario.php", {coment: comentario},
                                function (respuesta) {
                                    
                                    //cuando hace el insert, cambia el boton a disabled y pone el divisor de insertado
                                    $("#textocomentario").css('border-color', 'green');
                                    $("#correcto").css('visibility', 'visible');
                                    $( "#insertarComentario" ).prop( "disabled", true );

                                }).fail(function (jqXHR) {
                            alert("Error de tipo " + jqXHR.status);
                        });

                    });
                    
                    //Cuando presiona una tecla dentro del textarea del comentario pone en verde el borde, activa el boton
                    $("#textocomentario").keypress(function () {
                        $( "#insertarComentario" ).prop( "disabled", false );
                        $("#textocomentario").css('border-color', '#66afe9');
                        $("#correcto").css('visibility', 'hidden');

                    });

                    $(function () {

                        var valor, contador, parrafo;
                        contador = 250;
                        valor2 = $('#textocomentario').val().length;

                        // Mostramos un mensaje inicial y lo añadimos al div de id contador.
                        $('<p class="indicador">Tienes ' + (contador - valor2) + ' caracteres restantes</p>').appendTo('#contador');

                        // Definimos el evento para que detecte cada vez que se presione una tecla.
                        $('#textocomentario').keydown(function () {

                            // Redefinimos el valor de contador al máximo permitido (150).
                            contador = 250;

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

                }
        ).fail(function (jqXHR) {
            alert("Error de tipo " + jqXHR.status);
        });

    }

</script>
@endsection

@section('contenido')


<div style="margin-top: 55px;">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <!-- El logotipo y el icono que despliega el menú se agrupan
             para mostrarlos mejor en los dispositivos móviles -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-ex1-collapse">
                <span class="sr-only">Desplegar navegación</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Logotipo</a>
        </div>

        <!-- Agrupar los enlaces de navegación, los formularios y cualquier
             otro elemento que se pueda ocultar al minimizar la barra -->
        <div class="collapse navbar-collapse navbar-ex1-collapse" style="margin-right: 2%;">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Enlace #1</a></li>
                <li><a href="#">Enlace #2</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Menú #2 <b class="caret"></b>
                    </a>

                    <div class="row dropdown-menu" style="width: 350px; background-color: #F3F3F3;">
                        <div class="container" style="width: 100%; height: 200px;">
                            <div style="height: 70%; background-color: blue;">

                            </div>
                            <div style="height: 30%; background-color: red;">
                                <div class="col-md-6">
                                    <input type="submit" name="registrar" id="registrar"
                                           value="Registrar" class="btn btn-primary">
                                </div>
                                <div class="col-md-6">
                                    <input type="submit" name="registrar" id="registrar"
                                           value="Registrar" class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

            </ul>
        </div>
    </nav>

    <div class="contenedorPrincipal">
        <!--div que contiene los cargos y las categorias-->
        <div class="cargoCat">
            <div class='divBotonCargoCat'>
                <select id="carg" class='botonCargoCat form-control'>
                    <option value="-1">-Elige cargo-</option>

                    @for($i=0;$i<count($roles);$i++)
                        <option value="{!! $roles[$i][0]->id_rol !!}">{!! $roles[$i][0]->descripcion !!}</option>
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


        <!--<div class="flex-container">-->
        <div class="row">

            <div class="col-md-4 divitem">
                <div class="item">
                    <b>Por Hacer</b>

                    <div id="item1" class=" conectardivisores divmover" value="Por Hacer">
                    </div>
                </div>
            </div>


            <div class="col-md-4 divitem">
                <div class="item">
                    <b>Pendiente</b>

                    <div id="item2" class=" conectardivisores divmover" value="Pendiente">
                    </div>
                </div>
            </div>


            <div class="col-md-4 divitem">
                <div class="item">
                    <b>Hecho</b>

                    <div id="item3" class=" conectardivisores divmover" value="Hecho">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
