@extends('maestra')

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
        $("#item1,#item2,#item3,#item4").sortable({
            connectWith: ".conectardivisores",
            cursor: "move",
            start: function (event, ui) {


                $(ui.item).css("-webkit-transform", "rotate(7deg)");
            },
            stop: function (event, ui) {


                $(ui.item).css("-webkit-transform", "rotate(0deg)");

                var id_tarea = $(ui.item).attr('value');
                var idtarea = JSON.stringify(id_tarea);


                var descripcionestado = $(this).attr('value');
                var estado = JSON.stringify(descripcionestado);


                $.post("../resources/views/actualizarestado.php", {id: idtarea, estadoactual: estado},
                        function (respuesta) {


                            if (respuesta == true) {

                                alert("actualziado con exito");
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

            var id = $(this).val();
            id_rol = id;
            var idjson = JSON.stringify(id);

            $.post("../resources/views/categorias.php", {rol: idjson},
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

            $.post("../resources/views/tareas.php", {id: idjson},
                    function (respuesta) {
                        var tarea = JSON.parse(respuesta);
                        $("#item1").html('');
                        $("#item2").html('');
                        $("#item3").html('');
                        $("#item4").html('');
                        $("#item5").html('');

                        for (var i = 0; i < tarea.length; i++) {
                            if (tarea[i]['estado'] == 1) {
                                $("#item1").append('<div value="' + tarea[i]['id'] + '" id="hola" class="panel panel-primary tarea" data-toggle="modal" data-target="#myModal"><p>' + tarea[i]['descripcion'] + '</p><p><a href="">' + tarea[i]['modelo'] + '</a></p>\n\
                                <div style="height: 25px; width: 32px; float: right; margin: 0px; padding: 0px; position: relative;">\n\
        <button class="" onclick="popup()" style="width:100%; height:100%; background: transparent; border: 0px; margin:0px;">\n\
<img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/></button>\n\
                        </div> </div>');
                            } else if (tarea[i]['estado'] == 2) {
                                $("#item2").append('<div value="' + tarea[i]['id'] + '" class="panel panel-primary tarea" data-toggle="modal" data-target="#myModal"><p>' + tarea[i]['descripcion'] + '</p><p><a href="">' + tarea[i]['modelo'] + '</a></p></div>');
                            } else if (tarea[i]['estado'] == 3) {
                                $("#item3").append('<div value="' + tarea[i]['id'] + '" class="panel panel-primary tarea" data-toggle="modal" data-target="#myModal"><p>' + tarea[i]['descripcion'] + '</p><p><a href="">' + tarea[i]['modelo'] + '</a></p></div>');
                            } else if (tarea[i]['estado'] == 4) {
                                $("#item4").append('<div value="' + tarea[i]['id'] + '" class="panel panel-primary tarea" data-toggle="modal" data-target="#myModal"><p>' + tarea[i]['descripcion'] + '</p><p><a href="">' + tarea[i]['modelo'] + '</a></p></div>');
                            } else if (tarea[i]['estado'] == 5) {
                                $("#item5").append('<label><input type="checkbox" checked value="' + tarea[i]['id'] + '">' + tarea[i]['descripcion'] + '</label>');
                            } else if (tarea[i]['estado'] == 6) {
                                $("#item5").append('<label><input type="checkbox" value="' + tarea[i]['id'] + '">' + tarea[i]['descripcion'] + '</label>');
                            }
                        }

                    }).fail(function (jqXHR) {
                alert("Error de tipo " + jqXHR.status);
            });
        });
    });

    function popup() {
        w2popup.open({
            title: 'Popup Title',
            body: '<div class="w2ui-centered">This is text inside the popup</div>'
        });
    }

</script>
@endsection

@section('contenido')



<div class="row">
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


            <div class="flex-container">

                <div class="item">
                    <b>Por Hacer</b>
                    <div id="item1" class="contenedortareas conectardivisores">
                        <div value="" id="hola" class="panel panel-primary tarea"><p></a></p>
                            <button class="" style="float: right; width: 30px; height: 30px; vertical-align: top;"onclick="popup()">Open Popup</button>
                        </div>
                    </div>


                </div>
                <div class="item">
                    <b>Haciendo</b>

                    <div id="item2" class="contenedortareas conectardivisores ">
                    </div>
                </div>


                <div class="item">
                    <b>Hecho</b>

                    <div id="item3" class="contenedortareas conectardivisores">
                    </div>
                </div>


                <div class="item">
                    <b>Aplazado</b>

                    <div id="item4" class="contenedortareas conectardivisores ">
                    </div>
                </div>


                <div class="item">

                    <b>Recibidos</b>
                    <div class="panel panel-primary tarea" id="item5">

                        <div class="checkbox">
                            <label><input type="checkbox" id="" value="">Documento para recibir 1</label>
                        </div>

                        <div class="checkbox">
                            <label><input type="checkbox" id="" value="">Documento para recibir 2</label>
                        </div>

                        <div class="checkbox">
                            <label><input type="checkbox" id="" value="">Documento para recibir 3</label>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
