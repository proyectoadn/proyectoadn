@extends('../maestra')

@section('titulo')
Administracion
@endsection


@section('js')
<script>

    var id_usu;
    var countCat;
    $(function () {
        //Filtro para la tabla
        $('#filter').keyup(function () {
            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();
        });

        function cargartabla() {
            //vacío el id usuarios (la tabla) por sihubiesealgo
            $("#usuarios").html('');
            //Hago una select con los usuarios trayendome los campos nombre, apellidos, email e id_usuario
            $.post("../resources/views/PhpAuxiliares/usuariosCargar.php", {},
                    function (respuesta) {
                        var usuarios = JSON.parse(respuesta);

                        //Elimino lo que haya en el divisor donde se pitan las tareas
                        $("#usuarios").html('');

                        //Hago un for pintando tantas filas como usuarios haya en la BBDD
                        for (var i = 0; i < usuarios.length; i++) {
                            //El botón abre un popup de bootstrap al cual le pasamos el id_usuario
                            $("#usuarios").append('<tr>\n\
                                                    <td>' + (i + 1) + '</td>\n\
                                                    <td>' + usuarios[i]['nombre'] + '</td>\n\
                                                    <td>' + usuarios[i]['apellidos'] + '</td>\n\
                                                    <td>' + usuarios[i]['email'] + '</td>\n\
                                                    <td>\n\
                                                        <button name="editUsu" name="editUsu" class="editUsu" value="' + usuarios[i]['id_usuario'] + '" data-toggle="modal" data-target="#editarUsuario">EditarUsuario</button>\n\
                                                        <button>Eliminar Usuario</button>\n\
                                                    </td>\n\
                                               </tr>\n\
                                                ');
                        }


                        $('.editUsu').on('click', function () {

                            id_usu = $(this).val();

                            var datos = JSON.stringify(id_usu);
                            $.post("../resources/views/PhpAuxiliares/editarUsuario.php", {datos: datos},
                                    function (respuesta) {
                                        var vector = JSON.parse(respuesta);

                                        //Vector con los datos del usuario con nombre, apellidos, email e id_usuario
                                        var usu = vector[0];
                                        //vector con todos los cargos de la tabla rol
                                        var cargos = vector[1];

                                        //Pinto el nombre en el popup
                                        $("#nombreUsuario").val(usu[0]['nombre']);

                                        //Pinto el apellido en el popup
                                        $("#apellidosUsuario").val(usu[0]['apellidos']);

                                        //Pinto el email en el popup
                                        $("#emailUsuario").val(usu[0]['email']);

                                        //En el divisor de los roles, pintamos todos los de la BBDD
                                        //Comprobamos con los roles que tiene el usuario y los que 
                                        //coinciden se marcan como "checked"
                                        $("#roles").html('');
                                        var coincide = false;
                                        for (var i = 0; i < cargos.length; i++) {
                                            coincide = false;
                                            for (var x = 0; x < usu.length; x++) {

                                                if (usu[x]['descripcion'] == cargos[i]['todosRoles']) {
                                                    coincide = true;
                                                }
                                            }
                                            if (coincide) {
                                                $("#roles").append('<label class="displayBock">\n\
                                                <input id="rol'+ i + '" checked class="seleccionarRoles" type="checkbox" value="">\n\
                                                ' + cargos[i]['todosRoles'] + '\n\
                                                </label>');
                                            } else {
                                                $("#roles").append('<label class="displayBock">\n\
                                                <input id="rol'+ i + '" class="seleccionarRoles" type="checkbox" value="">\n\
                                                ' + cargos[i]['todosRoles'] + '\n\
                                                </label>');
                                            }

                                        }//FIN FOR

                                        //Fuera del for, pinto el seleccionar todo en el divisor de roles
                                        $("#roles").append('<label class="displayBock" style="margin-top: 10px;">\n\
                                                <input type="checkbox" onclick="seleccionarRoles(this);"/>\n\
                                                Seleccionar todo\n\
                                                </label>');


                                    });
                        });

                        //Funcion que se lanza cuando cuando damos al aceptar del PopUp
                        $('#updateUsu').on('click', function () {
                            var nomUsuario = document.getElementById("nombreUsuario").value;
                            var apeUsuario = document.getElementById("apellidosUsuario").value;
                            var emaUsuario = document.getElementById("emailUsuario").value;
                            
                            //AHORA VAMOS A CAMBIAR LOS ROLES EN CASO DE QUE SE HAYAN CAMBIADO
                            //Miramos si estan checkeados y si no lo están cogemos el nmbre de la misma
                            var roles = new Array();
                            for (var i = 0; i < countCat; i++) {
                                if ($("#roles" + i).prop('checked')) {
                                    roles.push($("#roles" + i).val());
                                }
                            }
                            
                            //Creo un array y meto las variables anteriormente recogidas
                            var update = new Array();
                            update.push(nomUsuario);
                            update.push(apeUsuario);
                            update.push(emaUsuario);
                            update.push(id_usu);
                            update.push(roles);

                            //Paso a JSON
                            var datos = JSON.stringify(update);

                            //Update del usuario con los nuevos datos, cambien o no
                            $.post("../resources/views/PhpAuxiliares/updateUsuario.php", {datos: datos},
                                    function (respuesta) {
                                        console.log(respuesta);
                                        cargartabla();
                                    }).fail(function (jqXHR) {
                                alert("Error de tipo " + jqXHR.status);
                            });//FIN POST

                            
                            
                            


                        });

                    }).fail(function (jqXHR) {
                alert("Error de tipo " + jqXHR.status);
            });
        }
        cargartabla();
    });


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
                <input id="filter" type="text" class="form-control" placeholder="Filtro tabla..."/>
            </div>
        </div>


    </div>

    <div class="form-group">
        <table class="tanle table-hover letrasblancas tablaUsuarios">
            <thead>
                <tr>
                    <th class="centrarCabeceras">#</th>
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


<!--INICIO MODAL DE MODIFICAR USUARIO-->
<div id="editarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog anchuraModalCrearDocumentacion">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="row">
                    <br>
                    <div class="col-md-6">
                        <label for="nombreUsuario">Nombre</label>
                        <input name="nombreUsuario" id="nombreUsuario" type="text"
                               class="form-control" value="">
                    </div>
                    <div class="col-md-6">
                        <label for="apellidosUsuario">Apellidos</label>
                        <input name="apellidosUsuario" id="apellidosUsuario" type="text"
                               class="form-control" value="">
                    </div>

                    <div class="col-md-12" style="margin-top: 20px;">
                        <label for="emailUsuario">Email</label>
                        <input name="emailUsuario" id="emailUsuario" type="text"
                               class="form-control" value="">
                    </div>
                    <div id="roles" class="col-md-12 roles" style="margin-top: 20px; font-weight: initial;" >
                        <!--SELECCIONAR TODOS-->
                        <label class="displayBock" style="margin-top: 10px;">
                            <input type="checkbox" onclick="seleccionarRoles(this);"/> 
                            Seleccionar todo
                        </label>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button id="updateUsu" class="btn btn-primary" data-dismiss="modal">
                    Aceptar
                </button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>
<!--FINAL MODAL DE MODIFICAR USUARIO-->
@endsection

@section('footer')

    @include ('PhpAuxiliares/footer')


@endsection
