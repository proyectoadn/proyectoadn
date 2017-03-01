@extends('../maestra')

@section('titulo')
Gestión de tareas
@endsection

@section('js')


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

                        <label class="displayBock">
                            <input type="checkbox" name="rol" class="seleccionarRoles">
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
                    <input type="submit" name="borrarentrega" value="Borrar" class="btn btn-primary botongestion botonborrargestion">
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

                        <label>
                            <input type="checkbox" name="categoria" class="seleccionarCategorias">
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
                    <input type="submit" name="borrarentrega" value="Borrar" class="btn btn-primary botongestion botonborrargestion">
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

                        <label class="displayBock">
                            <input type="checkbox" name="entrega" class="seleccionarEntrega">
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
                    <input type="submit" name="borrarentrega" value="Borrar" class="btn btn-primary botongestion botonborrargestion">
                </div>
            </div>
        </div>

    </div>
</div>



<div id="nuevorol" class="modal fade" role="dialog">
    <div class="modal-dialog anchuraModalCrearDocumentacion">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                
                <label>Nombre del rol</label>
                <input type="text" name="nombrerol" placeholder="Nombre del rol" class="form-control">
                
            </div>
            <div class="modal-footer">
                <button id="editDoc" class="btn btn-primary" id="insertarDocumentacion" data-dismiss="modal">
                    Añadir
                </button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>

<div id="nuevacategoria" class="modal fade" role="dialog">
    <div class="modal-dialog anchuraModalCrearDocumentacion">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                
                <label>Nombre de la categoria</label>
                <input type="text" name="nombrerol" placeholder="Nombre de la categoria" class="form-control">
                
            </div>
            <div class="modal-footer">
                <button id="editDoc" class="btn btn-primary" id="insertarDocumentacion" data-dismiss="modal">
                    Añadir
                </button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    Cancelar
                </button>
            </div>
        </div>
    </div>
</div>

<div id="nuevaentrega" class="modal fade" role="dialog">
    <div class="modal-dialog anchuraModalCrearDocumentacion">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                
                <label>Nombre de la entrega</label>
                <input type="text" name="nombrerol" placeholder="Nombre de la entrega" class="form-control">
                
            </div>
            <div class="modal-footer">
                <button id="editDoc" class="btn btn-primary" id="insertarDocumentacion" data-dismiss="modal">
                    Añadir
                </button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    Cancelar
                </button>
            </div>
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
