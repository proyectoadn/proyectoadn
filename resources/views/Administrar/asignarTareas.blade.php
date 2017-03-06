@extends('../maestra')

@section('titulo')
Administracion
@endsection


@section('js')


<script>

    var countTareas;
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


                        countTareas = 0;

                        for (var i = 0; i < tarea.length; i++) {
                            //Pinto las tareas con checkbox
                            $("#tareas").append('<label class="displayBock" >\n\
                                                    <input id="tarea' + i + '" class="seleccionarTareas" type="checkbox" value="' + tarea[i]['id_tarea'] + '">\n\
                                                    <div id="descripcion' + i + '">' + tarea[i]['descripcion'] + '</div>\n\
                                                </label>');

                            countTareas++;
                        }

                        //Pinto dinamicamente el seleccionar todo, fuera del for.
                        $("#tareas").append('<label class="displayBock" style="margin-top: 10px;">\n\
                                                <input type="checkbox" onclick="seleccionarTareas(this);"/>\n\
                                                Seleccionar todo\n\
                                            </label>');

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

                        $("#usuarios").append('<select style="margin-left: 15px;" id="selectUsuarios" class="selectpicker botonCargoCat form-control">');

                        for (var i = 0; i < tarea.length; i++) {

                            $(".selectpicker").append('<option value="' + tarea[i]['id_usuario'] + '">\n\
                                                        ' + tarea[i]['nombre'] + ' ' + tarea[i]['apellidos'] + '\
                                                        </option>');

                        }

                        $("#usuarios").append('</select>');
                    }).fail(function (jqXHR) {
                alert("Error de tipo " + jqXHR.status);
            });
        });//CIERRA ON CHANGE #TIPo

        $('#asignarPorUsuario').on('click', function () {

            var cargoTarea = $('#categ').val();
            var tareas = new Array();

            //Compruebo que ha seleccionado algún cargo
            if (cargoTarea != -1) {
                //Si selecciona algun cargo comprobamos cuales estan checked, y si es asi metemos el id de la tarea en un array
                for (var i = 0; i < countTareas; i++) {

                    if ($("#tarea" + i).prop('checked')) {

                        tareas.push($("#tarea" + i).val());
                    }
                }

                //Si no selecciona ninguna tarea, saca un mensaje de alert de que no la ha seleccionado
                if (tareas.length == 0) {
                    alert("Debe seleccionar alguna tarea");
                } else {
                    //Comprobamos que ha seleccionado un rol para sacar losusuarios
                    var tipo = $('#tipo').val();

                    if (tipo != -1) {

                        var datos = JSON.stringify(tareas);

                        var usu = $("#selectUsuarios").val();
                        var id_usuario = JSON.stringify(usu);
                        alert(id_usuario);



                        $.post("../resources/views/PhpAuxiliares/asignarTareaUsuario.php", {datos: datos, id_usuario: id_usuario},
                                function (respuesta) {

                                    console.log(respuesta);

                                }).fail(function (jqXHR) {
                            alert("Error de tipo " + jqXHR.status);
                        });

                    } else {
                        alert("Elija un rol para seleccionar un usuario");
                    }

                }


            } else {
                alert('Elija un cargo para asignar las categorias');
            }

        });//CIERRA ON CLICK DE asignarPorUsuario

        $('#asignarPorRol').on('click', function () {

            //rol seleccionado del select
            var cargoTarea = $('#categ').val();
            var roles = new Array();
            //Array de tareas para meterle los ids tarea
            var tareas = new Array();
            //veces que tiene que hacer el for    
            var pasadas = {!! count($roles)!!};



            //Compruebo que ha seleccionado algún cargo
            if (cargoTarea != -1) {
                //Si selecciona algun rol comprobamos cuales estan checked, y si es asi metemos el id del rol en un array
                for (var i = 0; i < pasadas; i++) {

                    if ($("#rol" + i).prop('checked')) {

                        roles.push($("#rol" + i).val());
                    }
                }

                //Metemos los id_tarea en el array tareas
                for (var i = 0; i < countTareas; i++) {

                    if ($("#tarea" + i).prop('checked')) {

                        tareas.push($("#tarea" + i).val());
                    }
                }


                //Si no selecciona ningun rol, saca un mensaje de alert de que no la ha seleccionado
                if (roles.length == 0) {
                    alert("Debe seleccionar algún rol");
                } else {

                    var idroles = JSON.stringify(roles);
                    var idtareas = JSON.stringify(tareas);

                    $.post("../resources/views/PhpAuxiliares/asignarTareaRol.php", {roles: idroles, tareas: idtareas},
                            function (respuesta) {

                                alert(respuesta);

                                if (respuesta == 'No existen usuarios') {

                                    alert("No existen usuarios en el rol seleccionado");
                                }

                            }).fail(function (jqXHR) {
                        alert("Error de tipo " + jqXHR.status);
                    });

                }


            } else {
                alert('Elija un cargo para asignar las categorias');
            }

        });//CIERRA ON CLICK DE asignarPorRol

    });//CIERRA EL FUNCTION GENERAL



</script>

@endsection


@section('contenido')

@include ('PhpAuxiliares/cabeceraadministrador')


<div class="contenedorPrincipal margensuperior">
    <!--div que contiene los cargos y las categorias-->

    <div class='limpiar'></div>
    <!-- DIVISOR ROW DE TODO -->
    <div class="row">
        <!-- DIVISOR IZQUIERDA -->
        <div class="col-md-6 ">
            <div class="item cajaAsignarTareas">
                <b>Tareas</b>

                <div class="row cargoCat">
                    <div class='col-md-6 divBotonCargoCat' style="width: auto;">
                        <select id="categ" class='botonCargoCat form-control'>
                            <option value="-1">-Elige cargo-</option>
                            @for($i=0;$i<count($roles);$i++)
                                <option value="{!! $roles[$i]->id_rol !!}">{!! $roles[$i]->descripcion !!}</option>
                                @endfor
                        </select>
                    </div>

                    <div class="col-md-6">
                        <button id="asignarPorRol" class="btn btn-primary botonasignartareas" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Asignar tareas al cargo</button>
                    </div>
                </div>

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
                    <div class="col-md-12">
                        <b>Usuarios</b>
                        <select id="tipo" class='botonCargoCat form-control'>
                            <option value="-1">-Elige cargo del usuario-</option>
                            @for($i=0;$i<count($roles);$i++)
                                <option value="{!! $roles[$i]->id_rol !!}">{!! $roles[$i]->descripcion !!}</option>
                                @endfor
                        </select>
                        <div id="usuarios">

                        </div>

                        <button id="asignarPorUsuario" class="btn btn-primary botonasignartareas" >Asignar tareas individualmente</button>
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

@include ('PhpAuxiliares/footer')

@endsection
