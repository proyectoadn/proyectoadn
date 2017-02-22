@extends('../maestra')

@section('titulo')
Administracion
@endsection


@section('js')
<script>


    $(function () {

        //Filtro para la tabla
        $('#filter').keyup(function () {
            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        })

        $("#usuarios").html('');
        $.post("../resources/views/PhpAuxiliares/usuariosActivar.php", {},
                function (respuesta) {
                    var usuarios = JSON.parse(respuesta);

                    //Elimino lo que haya en el divisor donde se pitan las tareas
                    $("#usuarios").html('');

                    for (var i = 0; i < usuarios.length; i++) {
                        //Pinto las tareas con checkbox
                        $("#usuarios").append('<tr class="fila"><th scope="row">1</th><td>' + usuarios[i]['nombre'] + '</td><td>' + usuarios[i]['apellidos'] + '</td><td>' + usuarios[i]['email'] + '</td><td>\n\
                                                        <div class="row divisorUsuarios">\n\
                                                        <div class="col-md-6">\n\
                                                        <button title="Validar usuario" onclick="validar(this)" class="botonTarea" value="' + usuarios[i]['id_usuario'] + '" id="validar"data-toggle="modal" data-target="#modalModificarTarea">\n\
                                                            <span class="glyphicon glyphicon-ok" style="width: 22px; height: 22px;"></span>\n\
                                                        </button>\n\
                                                        </div>\n\
                                                        <div class="col-md-6">\n\
                                                        <button title="Denegar usuario" onclick="denegar(this)" class="botonTarea" value="' + usuarios[i]['id_usuario'] + '" id="denegar"data-toggle="modal" data-target="#modalModificarTarea">\n\
                                                            <span class="glyphicon glyphicon-remove" style="width: 22px; height: 22px;"></span>\n\
                                                        </button>\n\
                                                        </div>\n\
                                                    </div>\n\
                                                        </td></tr>');

                    }

                }).fail(function (jqXHR) {
            alert("Error de tipo " + jqXHR.status);
        });

    });

    function validar(boton) {
        var id_usuario = boton.value;

        var id = JSON.stringify(id_usuario);

        $.post("../resources/views/PhpAuxiliares/validarUsuario.php", {id: id},
                function (respuesta) {


                }
        ).fail(function (jqXHR) {
            alert("Error de tipo " + jqXHR.status);
        });

    }

    function denegar(boton) {
        var id_usuario = boton.value;

        var id = JSON.stringify(id_usuario);

        $.post("../resources/views/PhpAuxiliares/denegarUsuario.php", {id: id},
                function (respuesta) {


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

    <div class="cargoCat" style="width: 50%;">
        <div class="row">
            <div class="col-md-push-1 col-md-1" style="padding: 7px;">
                <label class="letrasblancas">Filtro</label>
            </div>
            
            <div class="col-md-push-1 col-md-10">
                <input id="filter" type="text" class="form-control" placeholder="Filtro tabla..."/>
            </div>
        </div>

        

    </div>

    <div class="form-group">
        <table class="tanle table-hover letrasblancas tablaUsuarios">
            <thead>
                <tr>
                    <th class="">#</th>
                    <th class="centrarCabeceras">Nombre</th>
                    <th class="centrarCabeceras">Apellidos</th>
                    <th class="centrarCabeceras">Email</th>
                    <th class="centrarCabeceras">Opciones</th>
                </tr>
            </thead>
            <tbody id="usuarios" class="searchable">

            </tbody>
        </table>
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
