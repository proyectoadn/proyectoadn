@extends('../maestra')

@section('titulo')
Administracion
@endsection


@section('js')

<script>

    var id_rol;

    $(function () {



        $("#item1,#item2").sortable({
            connectWith: ".conectardivisores",
            cursor: "move",
            stop: function (event, ui) {


            }
        });











        //Codigo Nazario
        $("#carg").on("change", function () {            


            $("#contenedortareas").html('');
            $("#item1").html('');

            var id = $(this).val();
            id_rol = id;
            var idjson = JSON.stringify(id);

            $.post("../resources/views/PhpAuxiliares/categorias.php", {rol: idjson},
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
            vector.push(id_rol);
            var idjson = JSON.stringify(vector);

            $.post("../resources/views/PhpAuxiliares/documentacion.php", {id: idjson},
                    function (respuesta) {

                        var documentacion = JSON.parse(respuesta);
                        $("#item1").html('');
                        for (var i = 0; i < documentacion.length; i++) {
                            $("#item1").append('\<div class="divTareasAdmin">\n\<div value="' + documentacion[i]['id'] + '"  id="tareas" class="panel panel-primary col-md-4 tarea estiloTareaAdmin" >\n\
                                                                    <p class="textotarea">' + documentacion[i]['descripcion'] + '</p>\n\
                                                                    <p class="textotarea">\n\
                                                                        <a href="">' + documentacion[i]['modelo'] + '</a>\n\
                                                                    </p>\n\
                                                                    <div class="divisorBotonTarea">\n\
                                                                        <button class="botonTarea" value="' + documentacion[i]['id'] + '" id="comentario"data-toggle="modal" data-target="#modalModificarTarea">\n\
                                                                            <img alt="Editar tarea" title="Editar tarea" src="Imagenes/editar.png" style="width: 100%; height: 100%;" class=""/>\n\
                                                                        </button>\n\
                                                                    </div>\n\
                                                                </div>');

                            //style="padding: 0px; margin: auto; text-align: center;"
                            
                        }

                    }).fail(function (jqXHR) {
                alert("Error de tipo " + jqXHR.status);
            });
        });
    });


</script>
@endsection


@section('contenido')

@include ('PhpAuxiliares/cabeceraadministrador')

<div class="contenedorPrincipal">
    <!--div que contiene los cargos y las categorias-->
    <div class="cargoCat">
        <div class='divBotonCargoCat'>
            <select id="carg" class='botonCargoCat form-control'>
                <option value="-1">-Elige cargo-</option>

                @for($i=0;$i<count($roles[0]);$i++)
                    <option value="{!! $roles[0][$i]->id_rol !!}">{!! $roles[0][$i]->descripcion !!}</option>
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


    <div class="row">
        <div class="col-md-9">

            <div class="item" style="min-height: 400px;">

                <b>Documentacion</b>    

                <div class="row conectardivisores" id="item1" style="min-height: 100px;">
                    
                    
                    
                    <div class="col-md-4 divitem">

                        <div class="item divmover" style="background-color: red;">
                            <p>Prueba</p>
                        </div>                        
                    </div>
                    
                    <div class="col-md-4 divitem">

                        <div class="item divmover" style="background-color: red;">
                            <p>Prueba</p>
                        </div>                        
                    </div>
                    
                    <div class="col-md-4 divitem">

                        <div class="item divmover" style="background-color: red;">
                            <p>Prueba</p>
                        </div>                        
                    </div>
                    
                    <div class="col-md-4 divitem">

                        <div class="item divmover" style="background-color: red;">
                            <p>Prueba</p>
                        </div>                        
                    </div>
                    
                    <div class="col-md-4 divitem">

                        <div class="item divmover" style="background-color: red;">
                            <p>Prueba</p>
                        </div>                        
                    </div>
                    
                    <div class="col-md-4 divitem">

                        <div class="item divmover" style="background-color: red;">
                            <p>Prueba</p>
                        </div>                        
                    </div>

                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-md-3">
                <div class="item">
                    <b>Acción</b>
                    <div class="conectardivisores" id="item2" style="min-height: 100px;">

                    </div>
                </div>
            </div>



            <!--INICIO MODAL DE EDITAR DOCUMENTACION-->
            <div id="modalModificarTarea" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <!-- -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">EDITAR Documentación</h4>
                        </div>
                        <!-- -->
                        <div class="modal-body">
                            <div class="row" >
                                <div class="col-md-12" style="margin-bottom: 10px;">
                                    <input type="text" size="15" placeholder="modelo documentacion"> 
                                    <br>    
                                    <textarea id="" name="" class="form-control" maxlength="200" rows="5" type="text" 
                                              style="width: 100%; height: 60%;; margin-bottom:10px; resize: none;">TAREA</textarea>
                                    <input type="text" size="15" placeholder="documentacion"> 
                                </div>
                            </div>
                        </div>
                        <!-- -->
                        <div class="modal-footer">
                            <button class="btn btn-primary" id="insertarDocumentacion" data-dismiss="modal" >Aceptar</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--FINAL MODAL DE AÑADIR DOCUMENTACION-->

            <!--INICIO MODAL DE CREAR DOCUMENTACION-->
            <div id="modalCrearDocumentacion" class="modal fade" role="dialog">
                <div class="modal-dialog anchuraModalCrearDocumentacion">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">MODIFCAR Documentación</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row" >
                                <div class="col-md-4" style="margin-bottom: 10px;">
                                    <h4>Categoria</h4>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Option 1</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Option 1</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Option 1</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Option 1</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Option 1</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <h4>Rol</h4>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Option 1</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Option 1</label>
                                    </div> 
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Option 1</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Option 1</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Option 1</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Option 1</label>
                                    </div>
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Option 1</label>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <h4 style="text-align: center;">Entrega</h4>
                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">Option 1</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">Option 1</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">Option 1</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">Option 1</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">Option 1</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6    ">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">Option 1</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">Option 1</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">Option 1</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">Option 1</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">Option 1</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <h3>Nombre de la documentación</h3>
                                    <textarea id="textocomentario" name="mensaje" class="form-control" maxlength="200" rows="5" type="text" style="width: 100%; height: 60%;; margin-bottom:10px; resize: none;">200 COMO MAXIMO</textarea>
                                    <div id="contador" class="text-right text-danger" style="font-size:0.8em;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">

                            <button class="btn btn-primary" id="insertarDocumentacion" data-dismiss="modal" >Aceptar</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--FINAL MODAL DE AÑADIR DOCUMENTACION-->


        </div>
    </div>
</div><!-- FIN ROW -->
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
