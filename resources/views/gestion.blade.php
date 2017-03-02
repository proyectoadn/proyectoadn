@extends('../maestra')

@section('titulo')
Gestión de tareas
@endsection

@section('js')


<script>

    $(function () {

        $("#borrarrol").on("click", function () {


            var roles = {!! count($roles) !!}
            var borrar = new Array();
            var nombrerol = 'Roles';


            for (var i = 0; i < roles; i++) {

                if ($("#rol" + i).prop('checked')) {

                    borrar.push($("#nombrerol" + i).text().trim());
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

                    borrar.push($("#nombrecategoria" + i).text().trim());
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

                    borrar.push($("#nombreentregar" + i).text().trim());
                }
            }

            if (borrar.length == 0) {

                alert("Selecciona una entrega para borrar");

            }
            else {

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
    });

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
                            <input type="checkbox" name="rol" id="rol{!! $i !!}" value="rol{!! $i !!}" class="seleccionarRoles">
                            {!! $roles[$i]->descripcion !!}
                        </label>
                        @endfor

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
                            <input type="checkbox" name="categoria" id="categoria{!! $i !!}" value="categoria{!! $i !!}" class="seleccionarCategorias">
                            {!! $categorias[$i]->descripcion !!}
                        </label><br>
                        @endfor

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
                            <input type="checkbox" name="entrega" id="entrega{!! $i !!}" value="entrega{!! $i !!}" class="seleccionarEntrega">
                            {!! $entregar[$i]->descripcion !!}
                        </label>
                        @endfor

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
                    <input type="text" name="nombrerol" placeholder="Nombre del rol" class="form-control" required>

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
