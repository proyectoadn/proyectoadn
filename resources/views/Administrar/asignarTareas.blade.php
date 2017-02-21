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
                                <input type="checkbox" value="' + tarea[i]['id_tarea'] + '">\n\
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
                            $("#usuarios").append('<label class="displayBock" style="margin-left: 17px;">\n\
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
    <!--div que contiene los cargos y las categorias-->
    <div class="cargoCat">
        <div class='divBotonCargoCat'>
            <select id="categ" class='botonCargoCat form-control'>
                <option value="-1">-Elige cargo-</option>
                @for($i=0;$i<count($roles);$i++)
                    <option value="{!! $roles[$i]->id_rol !!}">{!! $roles[$i]->descripcion !!}</option>
                    @endfor
            </select>
        </div>
    </div>

    <div class='limpiar'></div>
    <!-- DIVISOR ROW DE TODO -->
    <div class="row">
        <!-- DIVISOR IZQUIERDA -->
        <div class="col-md-6 ">
            <div class="item cajaAsignarTareas">
                <b>Tareas</b>
                <div id="tareas" class="checkbox margenIzqAsignarDoc">

                </div>
            </div>
        </div>



        <!-- coge la mitad derecha -->
        <div class="col-md-6 ">
            <!-- Lo pinta de gris y le pone un alto minimo -->
            <div class="item cajaAsignarTareas">
                <!-- Pongo clase row para dividirlo en la mitad, usuarios y categorias -->
                <div class="row">

                    <!-- divisor para usuarios -->
                    <div class="col-md-6">
                        <b>Usuarios</b>
                        <select id="tipo" class='botonCargoCat form-control'>
                            <option value="-1">-Elige cargo-</option>
                            @for($i=0;$i<count($roles);$i++)
                                <option value="{!! $roles[$i]->id_rol !!}">{!! $roles[$i]->descripcion !!}</option>
                                @endfor
                        </select>
                        <div id="usuarios" class="checkbox">

                        </div>
                    </div>

                    <!-- divisor para roles -->
                    <div class="col-md-push-1 col-md-5">
                        <b>Roles</b>
                        <div class="checkbox">
                            @for($i=0;$i<count($roles);$i++)
                                <label class="displayBock">
                                    <input value="{!! $roles[$i]->id_rol !!}" type="checkbox" value="">
                                    {!! $roles[$i]->descripcion !!}
                                </label>
                                @endfor

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="alert alert-danger borrardocumentacion">

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
