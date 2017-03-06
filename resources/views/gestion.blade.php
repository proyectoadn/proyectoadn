@extends('../maestra')

@section('titulo')
Gestión de tareas
@endsection

@section('js')


<script>
    
    var id;
    var tablaeditargestion;

    $(function () {


        $("#borrarrol").on("click", function () {


            var roles = {!! count($roles) !!}
            var borrar = new Array();
            var nombrerol = 'Roles';


            for (var i = 0; i < roles; i++) {

                if ($("#rol" + i).prop('checked')) {

                    borrar.push($("#rol" + i).val());
                }
            }


            if (borrar.length == 0) {

                alert("Selecciona un rol para borrar");

            } else {

                var datos = JSON.stringify(borrar);
                var tipo = JSON.stringify(nombrerol);

                if (confirm("Si borras el rol se borrara la documentacion asociada a este rol y las tareas, estas seguro?")) {

                    $.post("../resources/views/PhpAuxiliares/borrargestion.php", {datos: datos, tipo: tipo},
                            function (respuesta) {

                                window.location = "gestion";

                            }).fail(function (jqXHR) {
                        alert("Error de tipo " + jqXHR.status);
                    });
                }
            }
        });

        $("#borrarcategoria").on("click", function () {



            var categorias = {!! count($categorias) !!}
            var borrar = new Array();
            var nombrecategoria = 'Categorias';

            for (var i = 0; i < categorias; i++) {

                if ($("#categoria" + i).prop('checked')) {

                    borrar.push($("#categoria" + i).val());
                }
            }

            if (borrar.length == 0) {

                alert("Selecciona una categoria para borrar");

            } else {

                var datos = JSON.stringify(borrar);
                var tipo = JSON.stringify(nombrecategoria);

                if (confirm("Si borras la categoria se borrara la documentacion asociada a esta categoria y las tareas, estas seguro?")) {

                    $.post("../resources/views/PhpAuxiliares/borrargestion.php", {datos: datos, tipo: tipo},
                            function (respuesta) {

                                window.location = "gestion";

                            }).fail(function (jqXHR) {
                        alert("Error de tipo " + jqXHR.status);
                    });
                }
            }
        });



        $("#borrarentrega").on("click", function () {



            var entregas = {!! count($entregar) !!}
            var borrar = new Array();
            var nombreentregas = 'Entregas';

            for (var i = 0; i < entregas; i++) {

                if ($("#entrega" + i).prop('checked')) {

                    borrar.push($("#entrega" + i).val());
                }
            }

            if (borrar.length == 0) {

                alert("Selecciona una entrega para borrar");

            } else {

                var datos = JSON.stringify(borrar);
                var tipo = JSON.stringify(nombreentregas);

                if (confirm("Estas seguro de que quieres borrar la entrega?")) {

                    $.post("../resources/views/PhpAuxiliares/borrargestion.php", {datos: datos, tipo: tipo},
                            function (respuesta) {

                                window.location = "gestion";

                            }).fail(function (jqXHR) {
                        alert("Error de tipo " + jqXHR.status);
                    });
                }
            }
        });

        $("#editar").on("click", function () {
            

            var descripcion = $("#descripcion").val();

            var descripcioneditar = JSON.stringify(descripcion);
            var idrolcategoriaentrega = JSON.stringify(id);
            var nombretabla = JSON.stringify(tablaeditargestion);


            $.post("../resources/views/PhpAuxiliares/editargestion.php", {id: idrolcategoriaentrega, descripcion: descripcioneditar, nombretabla: nombretabla},
                    function (respuesta) {
                        
                        

                    }).fail(function (jqXHR) {
            });
        });
    });

    function popup(boton, tabla) {

        id = boton.value;
        tablaeditargestion = tabla;


        var idrolcategoriaentrega = JSON.stringify(id);
        var nombretabla = JSON.stringify(tabla);


        $.post("../resources/views/PhpAuxiliares/gestion.php", {id: idrolcategoriaentrega, nombretabla: nombretabla},
                function (respuesta) {

                    var descripcion = JSON.parse(respuesta);


                    $("#descripcion").val(descripcion);

                }).fail(function (jqXHR) {
            alert("Error de tipo " + jqXHR.status);
        });

    }

</script>


@endsection


@section('contenido')

@include ('PhpAuxiliares/cabeceraadministrador')


<div class="contenedorPrincipal">

    <div class='limpiar'></div>


    <!--<div class="flex-container">-->
    <div class="row espaciongestion">

        <div class="col-md-4 divitem">

            <div class="item cajaAsignarTareas">

                <div class="">
                    <b>Roles actuales</b>
                </div>

                <div class="checkbox divgestionopciones">

                    @for($i=0;$i<count($roles);$i++)

                        <label class="displayBock" id="nombrerol{!! $i !!}">
                            <input type="checkbox" name="rol" id="rol{!! $i !!}" value="{!! $roles[$i]->id_rol !!}" class="seleccionarRoles">
                            <p>{!! $roles[$i]->descripcion !!}
                                <button onclick="popup(this, 'rol')" id="editarrol" value="{!! $roles[$i]->id_rol !!}" style="background: transparent; border: 0px; margin:0px;" data-toggle="modal" data-target="#editartarea">
                                    <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 20px; height: 20px;" class=""/>
                                </button>
                            </p>

                        </label>
                        @endfor
                        <br>

                        <label class="displayBock" style="margin-top: 10px;">
                            <input type="checkbox" onclick="seleccionarRoles(this);"/> 
                            Seleccionar todo
                        </label>
                </div>

                <div class="divbotongestion">

                    <input type="submit" name="nuevorol" value="Nuevo rol" class="btn btn-primary botongestion" data-toggle="modal" data-target="#nuevorol">
                    <button type="submit" name="borrarrol" id="borrarrol" value="Roles" class="btn btn-primary botongestion botonborrargestion">Borrar</button>
                </div>
            </div>
        </div>


        <div class="col-md-4 divitem">

            <div class="item cajaAsignarTareas">

                <div class="">
                    <b>Categorias actuales</b>
                </div>

                <div class="checkbox divgestionopciones">

                    @for($i=0;$i<count($categorias);$i++)

                        <label id="nombrecategoria{!! $i !!}">
                            <input type="checkbox" name="categoria" id="categoria{!! $i !!}" value="{!! $categorias[$i]->id_categoria !!}" class="seleccionarCategorias">
                            <p>{!! $categorias[$i]->descripcion !!}
                                <button onclick="popup(this, 'categorias')" value="{!! $categorias[$i]->id_categoria !!}" id="editarcategoria" style="background: transparent; border: 0px; margin:0px;" data-toggle="modal" data-target="#editartarea">
                                    <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 20px; height: 20px;" class=""/>
                                </button>
                            </p>

                        </label><br>
                        @endfor
                        <br>

                        <label class="displayBock" style="margin-top: 10px;">
                            <input type="checkbox" onclick="seleccionarCategorias(this);"/> 
                            Seleccionar todo
                        </label>
                </div>

                <div class="divbotongestion">

                    <input type="submit" name="nuevacategoria" value="Nueva categoria" class="btn btn-primary botongestion" data-toggle="modal" data-target="#nuevacategoria">
                    <button type="submit" name="borrarcategoria" id="borrarcategoria" value="Categorias" class="btn btn-primary botongestion botonborrargestion">Borrar</button>
                </div>
            </div>
        </div>


        <div class="col-md-4 divitem">

            <div class="item cajaAsignarTareas">

                <div class="">
                    <b>Entregar</b>
                </div>

                <div class="checkbox divgestionopciones">

                    @for($i=0;$i<count($entregar);$i++)

                        <label class="displayBock" id="nombreentregar{!! $i !!}">
                            <input type="checkbox" name="entrega" id="entrega{!! $i !!}" value="{!! $entregar[$i]->id_entregar !!}" class="seleccionarEntrega">
                            <p>{!! $entregar[$i]->descripcion !!}
                                <button onclick="popup(this, 'entregas')" value="{!! $entregar[$i]->id_entregar !!}" id="editarentrega" style="background: transparent; border: 0px; margin:0px;" data-toggle="modal" data-target="#editartarea">
                                    <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 20px; height: 20px;" class=""/>
                                </button>
                            </p>

                        </label>
                        @endfor
                        <br>

                        <label class="displayBock" style="margin-top: 10px;">
                            <input type="checkbox" onclick="seleccionarEntrega(this);"/> 
                            Seleccionar todo
                        </label>
                </div>

                <div class="divbotongestion">

                    <input type="submit" name="nuevaentrega" value="Nueva entrega" class="btn btn-primary botongestion" data-toggle="modal" data-target="#nuevaentrega">
                    <button type="submit" name="borrarentrega" id="borrarentrega" value="Entregas" class="btn btn-primary botongestion botonborrargestion">Borrar</button>
                </div>
            </div>
        </div>

    </div>
</div>



<div id="nuevorol" class="modal fade" role="dialog">
    <div class="modal-dialog anchuraModalCrearDocumentacion">
        <!-- Modal content-->
        <div class="modal-content">

            <form action="nuevorol" method="POST">
                {!! csrf_field() !!}

                <div class="modal-body">

                    <label>Nombre del rol</label>
                    <input type="text" name="nombrerol" id="nombrerol" placeholder="Nombre del rol" class="form-control nombrerol" required>

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">
                        Añadir
                    </button>

                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="nuevacategoria" class="modal fade" role="dialog">
    <div class="modal-dialog anchuraModalCrearDocumentacion">
        <!-- Modal content-->
        <div class="modal-content">

            <form action="nuevacategoria" method="POST">
                {!! csrf_field() !!}

                <div class="modal-body">

                    <label>Nombre de la categoria</label>
                    <input type="text" name="nombrecategoria" placeholder="Nombre de la categoria" class="form-control" required>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        Añadir
                    </button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        Cancelar
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<div id="nuevaentrega" class="modal fade" role="dialog">
    <div class="modal-dialog anchuraModalCrearDocumentacion">
        <!-- Modal content-->
        <div class="modal-content">

            <form action="nuevaentrega" method="POST">
                {!! csrf_field() !!}

                <div class="modal-body">

                    <label>Nombre de la entrega</label>
                    <input type="text" name="nombreentrega" placeholder="Nombre de la entrega" class="form-control" required>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        Añadir
                    </button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        Cancelar
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<div id="editartarea" class="modal fade" role="dialog">
    <div class="modal-dialog anchuraModalCrearDocumentacion">
        <!-- Modal content-->
        <div class="modal-content">

            <form action="editargestion" method="POST">
                {!! csrf_field() !!}

                <div class="modal-body">

                    <label>Editar la descripcion</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control">

                </div>

                <div class="modal-footer">


                    <button type="submit" id="editar" class="btn btn-primary">
                        Modificar
                    </button>
            </form>

            <button type="button" class="btn btn-primary" data-dismiss="modal">
                Cancelar
            </button>
        </div>
        </form>
    </div>
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
