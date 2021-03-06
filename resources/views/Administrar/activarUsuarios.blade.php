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
        });

        $("#usuarios").html('');
        $.post("../resources/views/PhpAuxiliares/usuariosActivar.php", {},
                function (respuesta) {
                    var usuarios = JSON.parse(respuesta);

                    //Elimino lo que haya en el divisor donde se pitan las tareas
                    $("#usuarios").html('');

                    for (var i = 0; i < usuarios.length; i++) {
                        //Pinto las tareas con checkbox
                        $("#usuarios").append('<tr class="alturatr fila">\n\
                                                <th scope="row">' + (i + 1) + '</th>\n\
                                                    <td name="nombre" value="' + usuarios[i]['nombre'] + '">' + usuarios[i]['nombre'] + '</td>\n\
                                                    <td name="apellidos"  value="' + usuarios[i]['apellidos'] + '">' + usuarios[i]['apellidos'] + '</td>\n\
                                                    <td name="email" value="' + usuarios[i]['email'] + '">' + usuarios[i]['email'] + '</td>\n\
                                                    <td>\n\
                                                        <div class="row divisorUsuarios">\n\
                                                            <div class="col-md-push-2 col-md-3">\n\
                                                                <button type="submit" title="Validar usuario" name="validar" class="botonTarea" value="' + usuarios[i]['id_usuario'] + '">\n\
                                                                    <span class="glyphicon glyphicon-ok" style="width: 22px; height: 22px;"></span>\n\
                                                                </button>\n\
                                                            </div>\n\
                                                            <div class="col-md-push-2 col-md-3">\n\
                                                                <button title="Denegar usuario" onclick="denegar(this)" class="botonTarea" value="' + usuarios[i]['id_usuario'] + '" id="denegar"data-toggle="modal" data-target="#modalModificarTarea">\n\
                                                                <span class="glyphicon glyphicon-trash" style="width: 22px; height: 22px;"></span>\n\
                                                                </button>\n\
                                                            </div>\n\
                                                        </div>\n\
                                                    </td>\n\
                                                </tr>');

                    }

                }).fail(function (jqXHR) {
            alert("Error de tipo " + jqXHR.status);
        });

    });
    //Valida el usuario en la base de datos al pulsar el boton
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
    //Borra el usuario en la base de datos al pusar el boton
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
                <label class="letrasblancas" style="margin-top: 10px;">Filtro</label>
            </div>

            <div class="col-md-push-1 col-md-10" style="margin-top: 10px;">
                <input title="Filtro buscar para la tabla de los usuarios" id="filter" type="text" class="form-control" placeholder="Filtro tabla..."/>
            </div>
        </div>


    </div>

    <div class="form-group">
        <form action="enviarconfirm" method="POST">
            {!! csrf_field() !!}
            <table class="table table-hover letrasblancas tablaUsuarios">
                <thead >
                    <tr class="alturatr">
                        <th class="">#</th>
                        <th class="centrarCabeceras" >Nombre</th>
                        <th class="centrarCabeceras">Apellidos</th>
                        <th class="centrarCabeceras">Email</th>
                        <th class="centrarCabeceras">Opciones</th>
                    </tr >
                </thead>
                <tbody id="usuarios" class="searchable">
                    
                </tbody>
            </table>
        </form>
    </div>


</div>
@endsection

@section('footer')

@include ('PhpAuxiliares/footer')


@endsection
