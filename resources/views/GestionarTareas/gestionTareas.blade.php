@extends('../maestra')

@section('titulo')
    Gestión de tareas
@endsection

@section('js')

    <script>

        var id_rol;
        var id_tarea;

        $(function () {

            $("#exportarapdf").prop('disabled', true);


            //Funcionalidades del arrastrar y soltar
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


            //Funcion que se lanza cuando el desplegable de cargos cambia de valor
            $("#carg").on("change", function () {


                $("#item1").html('');
                $("#item2").html('');
                $("#item3").html('');

                var id = $(this).val();
                id_rol = id;
                var idjson = JSON.stringify(id);

                $.post("../resources/views/PhpAuxiliares/categorias.php", {rol: idjson},
                        function (respuesta) {
                            console.log(respuesta);
                            var categorias = JSON.parse(respuesta);
                            //Rellena el desplegable de categorias, filtrando por el cargo seleccionado.
                            $("#cat").html('<option id="categorias" value="-1">-Elige categoria-</option>');
                            for (var i = 0; i < categorias.length; i++) {
                                $("#cat").append('<option value=' + categorias[i]['id'] + '>' + categorias[i]['descripcion'] + '</option>');
                            }
                            //Si no hay cargo seleccionado, deshabilita el boton de exportar a pdf.
                            if ($("#carg").val() == -1) {
                                $("#exportarapdf").prop('disabled', true);
                            }

                        }).fail(function (jqXHR) {
                    alert("Error de tipo " + jqXHR.status);
                });
            });

            //Funcion que se lanza si se cambia el despegable de categorias, rellenando las tareas.
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
                                //Tarea por hacer.
                                if (tarea[i]['estado'] == 1) {
                                    $("#item1").append('<div value="' + tarea[i]['id'] + '" id="tareas" class="panel panel-primary tarea">\n\
                                                    <p class="textotarea">' + tarea[i]['descripcion'] + '</p>\n\
                                                    <p class="textotarea"><a href="' + tarea[i]['link'] + '">' + tarea[i]['modelo'] + '</a></p>\n\
                                                        <div class="divisorBotonTarea" style="">\n\
                                                            <button onclick="popup(this)" class="botonTarea botonX" value="' + tarea[i]['id'] + '" id="comentario" style="" data-toggle="modal" data-target="#myModal">\n\
                                                                <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/>\n\
                                                            </button>\n\
                                                        </div>\n\
                                                    </div>');
                                    //Tarea pendiente.
                                } else if (tarea[i]['estado'] == 2) {
                                    $("#item2").append('<div value="' + tarea[i]['id'] + '" id="tareas" class="panel panel-primary tarea">\n\
                                                    <p class="textotarea">' + tarea[i]['descripcion'] + '</p>\n\
                                                    <p class="textotarea"><a href="' + tarea[i]['link'] + '">' + tarea[i]['modelo'] + '</a></p>\n\
                                                        <div class="divisorBotonTarea" style="">\n\
                                                            <button onclick="popup(this)" class="botonTarea botonX" value="' + tarea[i]['id'] + '" id="comentario" style="" data-toggle="modal" data-target="#myModal">\n\
                                                                <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/>\n\
                                                            </button>\n\
                                                        </div>\n\
                                                    </div>');
                                    //Tarea hecha.
                                } else if (tarea[i]['estado'] == 3) {
                                    $("#item3").append('<div value="' + tarea[i]['id'] + '" id="tareas" class="panel panel-primary tarea"><p class="textotarea">' + tarea[i]['descripcion'] + '</p><p class="textotarea"><a href="">' + tarea[i]['modelo'] + '</a></p>\n\
                        <div style="height: 25px; width: 32px; float: right; margin: 0px; padding: 0px; position: relative;">\n\
                        <button onclick="popup(this)" class="botonX" value="' + tarea[i]['id'] + '" id="comentario" style="width:100%; height:100%; background: transparent; border: 0px; margin:0px;" data-toggle="modal" data-target="#myModal">\n\
                        <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/></button>\n\
                        </div></div>');
                                }
                            }

                            //Activa el boton de exportar a PDF.
                            $("#exportarapdf").prop('disabled', false);

                        }).fail(function (jqXHR) {
                    alert("Error de tipo " + jqXHR.status);
                });
            });
        });

        //Funcion que se lanza cuando se da al boton de comentario de las tareas.
        function popup(boton) {

            var mens = new Array();
            id_tarea = boton.value;
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

                        $("#textocomentario").val(mens[0]);
                        $("#titulocoment").html(mens[1]);


                    }
            ).fail(function (jqXHR) {
                alert("Error de tipo " + jqXHR.status);
            });
        }

        //Insert en BBDD del comentario
        function insertar() {

            var texto = $("#textocomentario").val();

            var vector = new Array();
            vector.push(texto);
            vector.push(id_tarea);
            var comentario = JSON.stringify(vector);

            $.post("../resources/views/PhpAuxiliares/comentario.php", {coment: comentario},
                    function (respuesta) {


                    }).fail(function (jqXHR) {
                alert("Error de tipo " + jqXHR.status);
            });

        }

        function lock(msg) {
            w2popup.lock(msg, true);
            setTimeout(function () {
                w2popup.unlock();
            }, 1000);
        }

    </script>
@endsection

@section('contenido')

    @include ('PhpAuxiliares/cabecera')


    <div class="contenedorPrincipal">
        <!--div que contiene los cargos y las categorias-->
        <div class="cargoCat">
            <div class='divBotonCargoCat'>

                <form action="pdf" method="POST">
                    {!! csrf_field() !!}

                    <select title="Desplegable con los cargos" name="carg" id="carg" class='botonCargoCat form-control'>
                        <option value="-1">-Elige cargo-</option>

                        @for($i=0;$i<count($roles);$i++)
                            <option id="cargo"
                                    value="{!! $roles[$i][0]->id_rol !!}">{!! $roles[$i][0]->descripcion !!}</option>
                        @endfor
                    </select>


            </div>
            <div class='divBotonCargoCat'>
                <select title="Desplegable con las categorias" id="cat" name="cat" size="" class='botonCargoCat form-control'>
                    <option id="categorias" value="-1">-Elige categoria-</option>
                </select>
            </div>


            <input type="submit" name="exportarapdf" id="exportarapdf" value="Exportar a pdf"
                   class="btn btn-default exportarPDF">
            </form>
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

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Insertar comentario</h4>
                </div>
                <div class="modal-body">

                    <h4 id="titulocoment" class="modal-title">Titulo comentario</h4>
                    <br>
                <textarea title="Campo de texto para el comentario" id="textocomentario" name="mensaje" class="form-control" maxlength="250" rows="10"
                          type="text"
                          style="width: 100%; height: 60%;; margin-bottom:10px; resize: none;"></textarea>
                </div>
                <div class="modal-footer">

                    <button onclick="insertar()" class="btn btn-primary" id="insertarComentario2"
                            data-dismiss="modal">Aceptar
                    </button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>

        </div>
    </div>

@endsection



@section('footer')

    @include ('PhpAuxiliares/footer')

@endsection
