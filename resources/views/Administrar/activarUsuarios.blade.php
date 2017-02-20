@extends('../maestra')

@section('titulo')
Administracion
@endsection


@section('js')
<script>

    $(function () {
        $("#categ").on("change", function () {

            //Guardo el ID del combo que pulso
            var id = $(this).val();
            //Creo un vector para guardarlo
            var vector = new Array();
            //Meto el id del combo en el vector
            vector.push(id);
            //Lo paso
            var idjson = JSON.stringify(vector);


            $.post("../resources/views/PhpAuxiliares/cargarTareas.php", {id: idjson},
                    function (respuesta) {

                        var tarea = JSON.parse(respuesta);

                        //Elimino lo que haya en el divisor donde se pitan las tareas
                        $("#tareas").html('');

                        for (var i = 0; i < tarea.length; i++) {
                            //Pinto las tareas con checkbox
                            $("#tareas").append('<label class="displayBock">\n\
                                <input type="checkbox" value="">\n\
                                ' + tarea[i]['descripcion'] + '\n\
                                </label>');
                        }

                    }).fail(function (jqXHR) {
                alert("Error de tipo " + jqXHR.status);
            });

        });//CIERRA ON CHANGE #CATEG


        $("#tipo").on("change", function () {
            //Guardo el ID del combo que pulso
            var id = $(this).val();
            //Creo un vector para guardarlo
            var vector = new Array();
            //Meto el id del combo en el vector
            vector.push(id);

            //Lo paso
            var idjson = JSON.stringify(vector);

            $.post("../resources/views/PhpAuxiliares/cargarUsuarios.php", {id: idjson},
                    function (respuesta) {

                        var tarea = JSON.parse(respuesta);

                        //Elimino lo que haya en el divisor donde se pitan los usuarios
                        $("#usuarios").html('');

                        for (var i = 0; i < tarea.length; i++) {
                            //Pinto los usuarios con checkboxes
                            $("#usuarios").append('<label class="displayBock">\n\
                                <input value="' + tarea[i]['id_usuario'] + '" type="checkbox" value="">\n\
                                ' + tarea[i]['nombre'] + ' ' + tarea[i]['apellidos'] + '\n\
                                </label>');
                        }

                    }).fail(function (jqXHR) {
                alert("Error de tipo " + jqXHR.status);
            });
        });//CIERRA ON CHANGE #TIPo


    });//CIERRA EL FUNCTION GENERAL



</script>

@endsection


@section('contenido')

@include ('PhpAuxiliares/cabeceraadministrador')

<div class="contenedorPrincipal">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
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
